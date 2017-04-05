<?php 
require_once('connections/db-settings.php');
require_once('connections/getaway.php');
mysql_select_db($database_nyscia, $nyscia) or die(mysql_error());
include('load/codigos.php');

$new = "y";
$old = "x";

 while($producto=$stmtdeta->fetch(PDO::FETCH_ASSOC)){
 	$new = $producto["idActividades"];

 	
 		
 		echo "ID Categoria : " . $producto["idCategoria"] . " - ID Actividad : " . $producto["idActividades"] . "<br />";
 	

 	$old = $new;
 	
 }


?>