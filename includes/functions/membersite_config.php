<?PHP
require_once("registration.php");

$registration = new Registration();

//Provide your site name here
$registration->SetWebsiteName('localhost/jokes-app');

//Provide the email address where you want to get notifications
$registration->SetAdminEmail('vianney.ain.travail@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$registration->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'',
                      /*database name*/'jokes',
                      /*table name*/'users');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$registration->SetRandomKey('qSRcVS6DrTzrPvr');

?>
