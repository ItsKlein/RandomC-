<?php

// DEFINE ROUTE PATH FOR SERVER DEPLOYMENT 
define('ROOT_PATH', __DIR__  . '/');

define ('CONNECTION_PATH' , ROOT_PATH . '/PhpFlow/Connection.php');
define ('INFORMATIONS_PATH', ROOT_PATH .'/PhpFlow/Php-get-info.php' );
define ('AJAX-ENDPOINT_PATH', ROOT_PATH . '/PhpFlow/Fetch-User-Data.php.php');
define ('DELETE_PATH_PATH', ROOT_PATH . '/PhpFlow/Delete.php');
define ('LOGIN-ROUTE_PATH', ROOT_PATH .'/PhpFlow/login.php');
define ('SESSION-START_PATH', ROOT_PATH .'/PhpFlow/Session-Start.php');
define('SESSION_TOKEN_PATH', ROOT_PATH . '/PhpFlow/Session-Token.php');
define ('CHILD_ADD', ROOT_PATH . '/PhpFlow/Child.php');
define ('Parent_ADD', ROOT_PATH . '/PhpFlow/Fetch-Parent-Data.php');
define ('SMS_ROOT', ROOT_PATH . '/PhpFlow/Sms.php');


// Other configuration settings
$site_title = "Your Website Title";
// Define the base URL
$base_url = "http://localhost/TumagaHealthTrack/";


?>
