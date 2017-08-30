<?php
  class User_Ajax_Model {
    public function __construct() {

    }

    public function update_user_wallpaper($user_id, $wallpaper){
        $sql = "UPDATE users SET ";
        $sql .= "wallpaper = '$wallpaper' ";

        $sql .= "WHERE id='$user_id'";

        $db = Db::getInstance();
        $qry = $db->quote($sql);
        $qry = $db->prepare($sql);
        $qry->execute();

        if ($qry->rowCount() == 1){
            $message = array(
                    'message' => "L'image de mur a bien été modifié.",
                    'success' => true,
            );
            return $message;
        }
        else {
            $message = array(
                    'message' => "Une erreur s'est produite.",
                    'code' => '427',
                    'success' => false,
            );
            return $message;
        }
    }

    public function update_user_description($user_id, $description){
        $sql = "UPDATE users SET ";
        $sql .= "description = '$description' ";

        $sql .= "WHERE id='$user_id'";

        $db = Db::getInstance();
        $qry = $db->quote($sql);
        $qry = $db->prepare($sql);
        $qry->execute();

        if ($qry->rowCount() == 1){
            $message = array(
                    'message' => "La description a bien été modifié.",
                    'success' => true,
            );
            return $message;
        }
        else {
            $message = array(
                    'message' => "Une erreur s'est produite.",
                    'code' => '424',
                    'success' => false,
            );
            return $message;
        }
    }

    public function update_user_avatar($user_id, $avatar){
        $sql = "UPDATE users SET ";
        $sql .= "avatar = '$avatar' ";

        $sql .= "WHERE id='$user_id'";

        $db = Db::getInstance();
        $qry = $db->quote($sql);
        $qry = $db->prepare($sql);
        $qry->execute();

        if ($qry->rowCount() == 1){
            $message = array(
                    'message' => "L'avatar a bien été modifié.",
                    'success' => true,
            );
            return $message;
        }
        else {
            $message = array(
                    'message' => "Une erreur s'est produite.",
                    'code' => '421',
                    'success' => false,
            );
            return $message;
        }
    }

    public function update_user_infos($username, $email, $password, $new_password = null){
        $pwdmd5 = md5($password);
        $npwdmd5 = md5($new_password);

        $sql = "UPDATE users SET ";
        $sql .= "email = '$email' ";

        if (isset($new_password) && !empty($new_password)){
            $sql .= ', ';
            $sql .= 'password = "'.$npwdmd5.'" ';
        }

        $sql .= "WHERE username='$username' and password='$pwdmd5'";

        $db = Db::getInstance();
        $qry = $db->quote($sql);
        $qry = $db->prepare($sql);
        $qry->execute();

        if ($qry->rowCount() == 1){
            $message = array(
                    'message' => 'Les informations ont bien été modifiées.',
                    'success' => true,
            );
            return $message;
        }
        else {
            $message = array(
                    'message' => "Le mot de passe ne correspond pas ou il n'y avait rien a modifier.",
                    'code' => '418',
                    'success' => false,
            );
            return $message;
        }
    }

  }
?>
