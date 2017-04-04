<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO horarios (idLugar, hora, dia, tipo) VALUES (:idLugar, :hora, :dia, :tipo)";

$stmt=$db->prepare($query);

$stmt->bindParam(':idLugar', $idLugar);
$stmt->bindParam(':hora', $hora);
$stmt->bindParam(':dia', $dia);
$stmt->bindParam(':tipo', $tipo);


$idLugar=$_POST['idLugar'];
$hora=$_POST['hora'];
$tipo=$_POST['tipo'];
$dia=$_POST['dia'];


if($stmt->execute()){echo '<script>
self.location = "../horarios.php"
</script>';}


?>



