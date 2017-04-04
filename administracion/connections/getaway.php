<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_nyscia = "localhost";
$database_nyscia = "repuest4_secure_getaway";
$username_nyscia = "root";
$password_nyscia = "";
$nyscia = mysql_connect($hostname_nyscia, $username_nyscia, $password_nyscia) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES 'utf8'");
?>