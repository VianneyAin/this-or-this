<?php
/**
** Done with http://requiremind.com/a-most-simple-php-mvc-beginners-tutorial/
**/
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        $db_host = 'localhost';
        $db_name = 'jokes';
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'utf8'";
        self::$instance = new PDO('mysql:host='.$db_host.';dbname='.$db_name, 'root', '', $pdo_options);
      }
      return self::$instance;
    }
  }
?>
