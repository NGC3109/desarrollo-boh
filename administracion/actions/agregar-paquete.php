<?php
require_once('../connections/db-settings.php');
$db = pdoConnect();

$idProducto = $_POST["idProducto"];
$duallistbox_demo1 = $_POST["duallistbox_demo1"];

if (is_array($duallistbox_demo1)) {
   foreach ($duallistbox_demo1 as $keyActividad => $valueActividad ) {
    $query = "INSERT INTO paquetes (id, idProducto, idActividad) VALUES (0, '$idProducto', '$valueActividad')";
    $stmtco= $db->prepare($query);
	if(!$stmtco->execute()){}
  }
	header("Location: ../paquetes.php");
}
?>