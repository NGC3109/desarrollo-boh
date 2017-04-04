<?php


$db_host2 = "localhost"; //Host address (most likely localhost)
$db_name2 = "repuest4_secure_getaway"; //Name of Database
$db_user2 = "root"; //Name of database user
$db_pass2 = ""; //Password for database user

// All SQL queries use PDO now
function pdoConnect(){
	// Let this function throw a PDO exception if it cannot connect
	global $db_host2, $db_name2, $db_user2, $db_pass2;
	$db2 = new PDO("mysql:host=$db_host2;dbname=$db_name2;charset=utf8", $db_user2, $db_pass2);
	$db2->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $db2;
}










?>