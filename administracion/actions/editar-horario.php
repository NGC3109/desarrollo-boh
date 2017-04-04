<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['borrar'])
{
$query2="DELETE FROM horarios WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../horarios.php"
</script>';}
}
else{
$query="UPDATE horarios SET idLugar=:idLugar, hora=:hora, tipo=:tipo, dia=:dia WHERE id=:id";

$stmt=$db->prepare($query);


$stmt->bindParam(':idLugar', $idLugar);
$stmt->bindParam(':hora', $hora);
$stmt->bindParam(':dia', $dia);
$stmt->bindParam(':tipo', $tipo);
$stmt->bindParam(':id', $id);

$id=$_POST['id'];
$idLugar=$_POST['idLugar'];
$hora=$_POST['hora'];
$dia=$_POST['dia'];
$tipo=$_POST['tipo'];

if($stmt->execute()){echo '<script>
self.location = "../horarios.php"
</script>';}

}


?>



