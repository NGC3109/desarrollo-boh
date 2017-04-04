<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO reservas (nombre, usuario, cancha, fecha_inicio, fecha_fin, hora_inicio, hora_fin, dia) VALUES (:nombre, :usuario, :cancha, :fecha_inicio, :fecha_fin, :hora_inicio, :hora_fin, :dia)";

$stmt=$db->prepare($query);

$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':cancha', $cancha);
$stmt->bindParam(':fecha_inicio', $fecha_inicio);
$stmt->bindParam(':fecha_fin', $fecha_fin);
$stmt->bindParam(':hora_inicio', $hora_inicio);
$stmt->bindParam(':hora_fin', $hora_fin);
$stmt->bindParam(':dia', $dia);


$nombre=$_POST['nombre'];
$usuario=0;
$cancha=$_POST['cancha_l'];
$fecha_inicio=$_POST['start'];
$fecha_fin=$_POST['end'];
$hora_inicio=$_POST['hora_inicio_l'];
$hora_fin=$_POST['hora_fin_l'];
$dia=$_POST['dia'];


if($stmt->execute()){echo '<script>
self.location = "../bloquear-horarios.php"
</script>';}


?>



