<?PHP
/*
    Registration/Login script from HTML Form Guide
    V1.0

    This program is free software published under the
    terms of the GNU Lesser General Public License.
    http://www.gnu.org/copyleft/lesser.html


This program is distributed in the hope that it will
be useful - WITHOUT ANY WARRANTY; without even the
implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.

For updates, please visit:
http://www.html-form-guide.com/php-form/php-registration-form.html
http://www.html-form-guide.com/php-form/php-login-form.html

*/
require_once("class.phpmailer.php");
require_once("formvalidator.php");

class Registration
{
    var $admin_email;
    var $from_address;

    var $username;
    var $pwd;
    var $database;
    var $tablename;
    var $connection;
    var $rand_key;

    var $error_message;

    //-----Initialization -------
    function FGMembersite()
    {
        $this->sitename = 'localhost/joke-app';
        $this->rand_key = '0iQx5oBk66oVZep';
    }

    function InitDB($host,$uname,$pwd,$database,$tablename)
    {
        $this->db_host  = $host;
        $this->username = $uname;
        $this->pwd  = $pwd;
        $this->database  = $database;
        $this->tablename = $tablename;

    }
    function SetAdminEmail($email)
    {
        $this->admin_email = $email;
    }

    function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }

    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }

    //-------Main Operations ----------------------
    function RegisterUser()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }

        $formvars = array();

        if(!$this->ValidateRegistrationSubmission())
        {
            return false;
        }

        $this->CollectRegistrationSubmission($formvars);

        if(!$this->SaveToDatabase($formvars))
        {
            return false;
        }

        /*if(!$this->SendUserConfirmationEmail($formvars))
        {
            return false;
        }

        $this->SendAdminIntimationEmail($formvars);*/

        return true;
    }

    function ConfirmUser()
    {
        if(empty($_GET['code'])||strlen($_GET['code'])<=10)
        {
            $this->HandleError("Please provide the confirm code");
            return false;
        }
        $user_rec = array();
        if(!$this->UpdateDBRecForConfirmation($user_rec))
        {
            return false;
        }

        $this->SendUserWelcomeEmail($user_rec);

        $this->SendAdminIntimationOnRegComplete($user_rec);

        return true;
    }

    function Login()
    {
        if(empty($_POST['username']))
        {
            $this->HandleError("UserName is empty!");
            return false;
        }

        if(empty($_POST['password']))
        {
            $this->HandleError("Password is empty!");
            return false;
        }

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(!isset($_SESSION)){
            session_start();
        }
        if(!$this->CheckLoginInDB($username,$password))
        {
            return false;
        }

        $_SESSION[$this->GetLoginSessionVar()] = $username;

        return true;
    }

    function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();

         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }

    function UserFullName()
    {
        return isset($_SESSION['name_of_user'])?$_SESSION['name_of_user']:'';
    }

    function UserEmail()
    {
        return isset($_SESSION['email_of_user'])?$_SESSION['email_of_user']:'';
    }

    function LogOut()
    {
        if(!isset($_SESSION)){ session_start(); }

        $sessionvar = $this->GetLoginSessionVar();

        $_SESSION[$sessionvar]=NULL;

        unset($_SESSION[$sessionvar]);

        session_destroy();
        
        return true;
    }

    function EmailResetPasswordLink()
    {
        if(empty($_POST['email']))
        {
            $this->HandleError("Email is empty!");
            return false;
        }
        $user_rec = array();
        if(false === $this->GetUserFromEmail($_POST['email'], $user_rec))
        {
            return false;
        }
        if(false === $this->SendResetPasswordLink($user_rec))
        {
            return false;
        }
        return true;
    }

    function ResetPassword()
    {
        if(empty($_GET['email']))
        {
            $this->HandleError("Email is empty!");
            return false;
        }
        if(empty($_GET['code']))
        {
            $this->HandleError("reset code is empty!");
            return false;
        }
        $email = trim($_GET['email']);
        $code = trim($_GET['code']);

        if($this->GetResetPasswordCode($email) != $code)
        {
            $this->HandleError("Bad reset code!");
            return false;
        }

        $user_rec = array();
        if(!$this->GetUserFromEmail($email,$user_rec))
        {
            return false;
        }

        $new_password = $this->ResetUserPasswordInDB($user_rec);
        if(false === $new_password || empty($new_password))
        {
            $this->HandleError("Error updating new password");
            return false;
        }

        if(false == $this->SendNewPassword($user_rec,$new_password))
        {
            $this->HandleError("Error sending new password");
            return false;
        }
        return true;
    }

    function ChangePassword()
    {
        if(!$this->CheckLogin())
        {
            $this->HandleError("Not logged in!");
            return false;
        }

        if(empty($_POST['oldpwd']))
        {
            $this->HandleError("Old password is empty!");
            return false;
        }
        if(empty($_POST['newpwd']))
        {
            $this->HandleError("New password is empty!");
            return false;
        }

        $user_rec = array();
        if(!$this->GetUserFromEmail($this->UserEmail(),$user_rec))
        {
            return false;
        }

        $pwd = trim($_POST['oldpwd']);

        if($user_rec['password'] != md5($pwd))
        {
            $this->HandleError("The old password does not match!");
            return false;
        }
        $newpwd = trim($_POST['newpwd']);

        if(!$this->ChangePasswordInDB($user_rec, $newpwd))
        {
            return false;
        }
        return true;
    }

    //-------Public Helper functions -------------
    function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }

    function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }

    //username, email, avatar, lastname or firstname
    function GetSessionInfos($field){
        if(!isset($_SESSION)){ session_start(); }
        return $_SESSION[$field];
    }

    function GetSessionDisplayName(){
        $name = '';
        if(!isset($_SESSION)){ return null; }
        if ( (isset($_SESSION['lastname']) && !empty($_SESSION['lastname'])) || (isset($_SESSION['firstname']) && !empty($_SESSION['firstname']))){
            $name = $_SESSION['firstname'];
            if (!empty($_SESSION['firstname']) && !empty($_SESSION['lastname'])){
                $name .= ' '.$_SESSION['lastname'];
            }
        }
        else {
            if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
                $name = $_SESSION['username'];
            }

        }
        return $name;
    }

    function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }

    function GetSpamTrapInputName()
    {
        return 'sp'.md5('KHGdnbvsgst'.$this->rand_key);
    }

    function GetErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }
        $errormsg = nl2br(htmlentities($this->error_message));
        return $errormsg;
    }
    //-------Private Helper functions-----------

    function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }

    function HandleDBError($err)
    {
        $this->HandleError($err."\r\n PDOerror:".mysql_error());
    }

    function GetFromAddress()
    {
        if(!empty($this->from_address))
        {
            return $this->from_address;
        }

        $host = $_SERVER['SERVER_NAME'];

        $from ="nobody@$host";
        return $from;
    }

    function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }

    function CheckLoginInDB($username,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        $pwdmd5 = md5($password);
        $sql = "Select id, username, email, avatar, firstname, lastname, role from $this->tablename where username='$username' and password='$pwdmd5'";
        $qry = $this->connection->prepare($sql);
        $qry->execute();
        $result = $qry->fetchAll();

        if(!$result || sizeof($result) <= 0)
        {
            $this->HandleError("Error logging in. The username or password does not match");
            return false;
        }

        $row = $result[0];
        $_SESSION['id'] = $row['id'];
        $_SESSION['username']  = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['avatar'] = $row['avatar'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['role'] = $row['role'];
        return true;
    }

    function UpdateDBRecForConfirmation(&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        $confirmcode = $this->SanitizeForSQL($_GET['code']);

        $result = mysql_query("Select name, email from $this->tablename where confirmcode='$confirmcode'",$this->connection);
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Wrong confirm code.");
            return false;
        }
        $row = mysql_fetch_assoc($result);
        $user_rec['name'] = $row['name'];
        $user_rec['email']= $row['email'];

        $qry = "Update $this->tablename Set confirmcode='y' Where  confirmcode='$confirmcode'";

        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }
        return true;
    }

    function ResetUserPasswordInDB($user_rec)
    {
        $new_password = substr(md5(uniqid()),0,10);

        if(false == $this->ChangePasswordInDB($user_rec,$new_password))
        {
            return false;
        }
        return $new_password;
    }

    function ChangePasswordInDB($user_rec, $newpwd)
    {
        $newpwd = $this->SanitizeForSQL($newpwd);

        $qry = "Update $this->tablename Set password='".md5($newpwd)."' Where  id_user=".$user_rec['id_user']."";

        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error updating the password \nquery:$qry");
            return false;
        }
        return true;
    }

    function GetUserFromEmail($email,&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        $email = $this->SanitizeForSQL($email);

        $result = mysql_query("Select * from $this->tablename where email='$email'",$this->connection);

        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("There is no user with email: $email");
            return false;
        }
        $user_rec = mysql_fetch_assoc($result);


        return true;
    }

    function SendUserWelcomeEmail(&$user_rec)
    {
        $mailer = new PHPMailer();

        $mailer->CharSet = 'utf-8';

        $mailer->AddAddress($user_rec['email'],$user_rec['name']);

        $mailer->Subject = "Welcome to ".$this->sitename;

        $mailer->From = $this->GetFromAddress();

        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "Welcome! Your registration  with ".$this->sitename." is completed.\r\n".
        "\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending user welcome email.");
            return false;
        }
        return true;
    }

    function SendAdminIntimationOnRegComplete(&$user_rec)
    {
        if(empty($this->admin_email))
        {
            return false;
        }
        $mailer = new PHPMailer();

        $mailer->CharSet = 'utf-8';

        $mailer->AddAddress($this->admin_email);

        $mailer->Subject = "Registration Completed: ".$user_rec['name'];

        $mailer->From = $this->GetFromAddress();

        $mailer->Body ="A new user registered at ".$this->sitename."\r\n".
        "Name: ".$user_rec['name']."\r\n".
        "Email address: ".$user_rec['email']."\r\n";

        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }

    function GetResetPasswordCode($email)
    {
       return substr(md5($email.$this->sitename.$this->rand_key),0,10);
    }

    function SendResetPasswordLink($user_rec)
    {
        $email = $user_rec['email'];

        $mailer = new PHPMailer();

        $mailer->CharSet = 'utf-8';

        $mailer->AddAddress($email,$user_rec['name']);

        $mailer->Subject = "Your reset password request at ".$this->sitename;

        $mailer->From = $this->GetFromAddress();

        $link = $this->GetAbsoluteURLFolder().
                '/resetpwd.php?email='.
                urlencode($email).'&code='.
                urlencode($this->GetResetPasswordCode($email));

        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "There was a request to reset your password at ".$this->sitename."\r\n".
        "Please click the link below to complete the request: \r\n".$link."\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;

        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }

    function SendNewPassword($user_rec, $new_password)
    {
        $email = $user_rec['email'];

        $mailer = new PHPMailer();

        $mailer->CharSet = 'utf-8';

        $mailer->AddAddress($email,$user_rec['name']);

        $mailer->Subject = "Your new password for ".$this->sitename;

        $mailer->From = $this->GetFromAddress();

        $mailer->Body ="Hello ".$user_rec['name']."\r\n\r\n".
        "Your password is reset successfully. ".
        "Here is your updated login:\r\n".
        "username:".$user_rec['username']."\r\n".
        "password:$new_password\r\n".
        "\r\n".
        "Login here: ".$this->GetAbsoluteURLFolder()."/login.php\r\n".
        "\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;

        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }

    function ValidateRegistrationSubmission()
    {
        //This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }

        $validator = new FormValidator();
        $validator->addValidation("email","email","Cette adresse email n'est pas correcte.");
        $validator->addValidation("email","req","Veuillez entrer votre adresse email.");
        $validator->addValidation("username","req","Veuillez entrer un nom d'utilisateur.");
        $validator->addValidation("password","req","Veuillez entrer votre mot de passe.");


        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }
        return true;
    }

    function CollectRegistrationSubmission(&$formvars)
    {
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['username'] = $this->Sanitize($_POST['username']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
    }

    function SendUserConfirmationEmail(&$formvars)
    {
        $mailer = new PHPMailer();

        $mailer->CharSet = 'utf-8';

        $mailer->AddAddress($formvars['email'], $formvars['username'], 0);

        $mailer->Subject = "Your registration with ".$this->sitename;

        $mailer->From = $this->GetFromAddress();

        $confirmcode = $formvars['confirmcode'];

        $confirm_url = $this->GetAbsoluteURLFolder().'/confirmreg.php?code='.$confirmcode;

        $mailer->Body ="Hello ".$formvars['username']."\r\n\r\n".
        "Merci de vous êtres inscris sur Blagues.tk\r\n".
        "Cliquez sur le lien ci-dessous pour confirmer votre inscription.\r\n".
        "$confirm_url\r\n".
        "\r\n".
        "Merci,\r\n".
        "Vianney Aïn, créateur de Blagues.tk\r\n";
        var_dump($mailer->Body);

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending registration confirmation email.");
            echo 'Mailer Error: ' . $mailer->ErrorInfo;
            return false;
        }
        return true;
    }
    function GetAbsoluteURLFolder()
    {
        $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
        $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
        return $scriptFolder;
    }

    function SendAdminIntimationEmail(&$formvars)
    {
        if(empty($this->admin_email))
        {
            return false;
        }
        $mailer = new PHPMailer();

        $mailer->CharSet = 'utf-8';

        $mailer->AddAddress($this->admin_email);

        $mailer->Subject = "New registration: ".$formvars['name'];

        $mailer->From = $this->GetFromAddress();

        $mailer->Body ="A new user registered at ".$this->sitename."\r\n".
        "Name: ".$formvars['name']."\r\n".
        "Email address: ".$formvars['email']."\r\n".
        "UserName: ".$formvars['username'];

        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }

    function SaveToDatabase(&$formvars)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Une erreur s'est produite !");
            return false;
        }
        if(!$this->Ensuretable())
        {
            return false;
        }
        if(!$this->IsFieldUnique($formvars,'email'))
        {
            $this->HandleError("Cette adresse email est déjà prise.");
            return false;
        }
        if(!$this->IsFieldUnique($formvars,'username'))
        {
            $this->HandleError("Ce nom d'utilisateur est déjà prit.");
            return false;
        }
        if(!$this->InsertIntoDB($formvars))
        {
            $this->HandleError("Une erreur s'est produite !");
            return false;
        }
        return true;
    }

    function IsFieldUnique($formvars,$fieldname)
    {
        $field_val = $formvars[$fieldname];

        $sql = "select username from $this->tablename where $fieldname='".$field_val."'";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->fetchColumn())
        {
            return false;
        }
        return true;
    }

    function DBLogin()
    {
        try {
            $this->connection = new PDO('mysql:host='.$this->db_host.';dbname='.$this->database.';charset=utf8mb4', $this->username, $this->pwd);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $ex) {
            echo "An Error occured!"; //user friendly message
            echo $ex->getMessage();
            //some_logging_function($ex->getMessage());
        }
        return true;
    }

    //Check if table exists, if not, we create it
    function Ensuretable()
    {
        if($this->TableExists($this->tablename)){
            return true;
        }
        else {
            return $this->CreateTable();
        }
    }

    function TableExists($table) {
        // Try a select statement against the table
        // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
        try {
            $result = $this->connection->query("SELECT 1 FROM $this->tablename LIMIT 1");
        } catch (Exception $e) {
            // We got an exception == table not found
            return FALSE;
        }

        // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
        return $result !== FALSE;
    }

    function CreateTable()
    {
        $qry ="CREATE table $this->tablename (
            id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR( 16 ) NOT NULL,
            email VARCHAR( 64 ) NOT NULL,
            password VARCHAR( 32 ) NOT NULL,
            role VARCHAR( 32 ) NOT NULL,
            avatar VARCHAR( 150 ),
            confirmcode VARCHAR( 150 ) NOT NULL);" ;
        try {
            $this->connection->exec($qry);
            print("Created $this->tablename Table.\n");
        } catch(PDOException $e) {
            echo $e->getMessage();//Remove or change message in production code
            return false;
        }
        return true;
    }

    function InsertIntoDB(&$formvars)
    {

        $confirmcode = $this->MakeConfirmationMd5($formvars['email']);

        $formvars['confirmcode'] = $confirmcode;

        $insert_query = $this->connection->prepare('INSERT INTO '.$this->tablename.'
                (
                    `email`,
                    `username`,
                    `password`,
                    `confirmcode`,
                    `role`
                )
                values
                (
                    "' . $formvars['email'] . '",
                    "' . $formvars['username'] . '",
                    "' . md5($formvars['password']) . '",
                    "' . $confirmcode . '",
                    "user"
                )');
        try {
            //$this->connection->exec($insert_query);
            $insert_query->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();//Remove or change message in production code
            //$this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }
        return true;
    }
    function MakeConfirmationMd5($email)
    {
        $randno1 = rand();
        $randno2 = rand();
        return md5($email.$this->rand_key.$randno1.''.$randno2);
    }

 /*
    Sanitize() function removes any potential threat from the
    data submitted. Prevents email injections or any other hacker attempts.
    if $remove_nl is true, newline chracters are removed from the input.
    */
    function Sanitize($str,$remove_nl=true)
    {
        $str = $this->StripSlashes($str);

        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
            $str = preg_replace($injections,'',$str);
        }

        return $str;
    }
    function StripSlashes($str)
    {
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        return $str;
    }
}
?>
