<?php

/*Jesus Rojas
* Config file - ReadyMedi Database connection
*/

date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set("display_errors", 1);
ini_set("error_log", "/home/stu/jrojas/php_errors.log");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function get_connection() {
    static $connection;

    if(!isset($connection)) {
        $connection = mysqli_connect('localhost', 'readymedi', 'Duc44Cpuzf', 'readymedi')
        or die(mysqli_connect_error());
    }
    if($connection == false) {
        echo "Unable to connect to database!</br>";
        echo mysqli_connect_error();
    }

    return $connection;
}
?>