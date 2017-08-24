<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('connection.php');
require_once('application.php');

$app = new Application();


$base_url = $app->getCurrentUri();
$paths = array();
$routes = array();
$paths = explode('/', $base_url);
foreach($paths as $path)
{
    if(trim($path) != '')
    array_push($routes, $path);
}

$app->load_pages($routes);









?>
