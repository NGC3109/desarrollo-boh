<?php
require_once('../connections/db-settings.php');
$dia=date('Ymdhis');
$db = pdoConnect();


$query="UPDATE floor_plan_top SET titulo_en=:titulo_en, titulo_es=:titulo_es, imagen=:imagen, col_izq_en=:col_izq_en, col_izq_es=:col_izq_es WHERE id=:id";

$query2="UPDATE floor_plan_top SET titulo_en=:titulo_en, titulo_es=:titulo_es, col_izq_en=:col_izq_en, col_izq_es=:col_izq_es WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':titulo_en', $titulo_en);
$stmt->bindParam(':titulo_es', $titulo_es);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':col_izq_en', $col_izq_en);
$stmt->bindParam(':col_izq_es', $col_izq_es);


$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':titulo_en', $titulo_en);
$stmt2->bindParam(':titulo_es', $titulo_es);
$stmt2->bindParam(':col_izq_en', $col_izq_en);
$stmt2->bindParam(':col_izq_es', $col_izq_es);



$id=1;
$titulo_en=$_POST['titulo_en'];
$titulo_es=$_POST['titulo_es'];
$col_izq_en=$_POST['col_izq_en'];
$col_izq_es=$_POST['col_izq_es'];

if($_FILES['imagen']['name']!="" && $_FILES['imagen']['name']!=NULL){
$dir_name = "../../img/";
$nombre=$dia.$_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;
if($stmt->execute()){echo '<script>
self.location = "../floor-plan.php"
</script>';}
}else{
if($stmt2->execute()){echo '<script>
self.location = "../floor-plan.php"
</script>';}
}



?>



