<?php


$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "getaway"; //Name of Database
$db_user = "root"; //Name of database user
$db_pass = ""; //Password for database user

// All SQL queries use PDO now
function pdoConnect(){
	// Let this function throw a PDO exception if it cannot connect
	global $db_host, $db_name, $db_user, $db_pass;
	$db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $db;
}

?>