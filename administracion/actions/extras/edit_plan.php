<?php
require_once('../connections/db-settings.php');
$dia=date('Ymdhis');
$db = pdoConnect();


$query="UPDATE floor_plan SET imagen1=:imagen1, imagen2=:imagen2, imagen3=:imagen3, imagen4=:imagen4, imagen5=:imagen5, titulo_en=:titulo_en, titulo_es=:titulo_es, contenido_en=:contenido_en, contenido_es=:contenido_es WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':imagen1', $imagen1);
$stmt->bindParam(':imagen2', $imagen2);
$stmt->bindParam(':imagen3', $imagen3);
$stmt->bindParam(':imagen4', $imagen4);
$stmt->bindParam(':imagen5', $imagen5);
$stmt->bindParam(':titulo_en', $titulo_en);
$stmt->bindParam(':titulo_es', $titulo_es);
$stmt->bindParam(':contenido_en', $contenido_en);
$stmt->bindParam(':contenido_es', $contenido_es);


$id=$_POST['id'];
$titulo_en=$_POST['titulo_en'];
$titulo_es=$_POST['titulo_es'];
$contenido_en=$_POST['contenido_en'];
$contenido_es=$_POST['contenido_es'];

if($_FILES['imagen1']['name']!="" && $_FILES['imagen1']['name']!=NULL){
$dir_name = "../../img/floor-plan/";
$nombre1=$dia.$_FILES['imagen1']['name'];
move_uploaded_file($_FILES['imagen1']['tmp_name'],$dir_name.$nombre1);
$imagen1=$nombre1;
}else{
$imagen1=$_POST['imagen1_ant'];	
}
if($_FILES['imagen2']['name']!="" && $_FILES['imagen2']['name']!=NULL){
$dir_name = "../../img/floor-plan/";
$nombre2=$dia.$_FILES['imagen2']['name'];
move_uploaded_file($_FILES['imagen2']['tmp_name'],$dir_name.$nombre2);
$imagen2=$nombre2;
}else{
$imagen2=$_POST['imagen2_ant'];	
}
if($_FILES['imagen3']['name']!="" && $_FILES['imagen3']['name']!=NULL){
$dir_name = "../../img/floor-plan/";
$nombre3=$dia.$_FILES['imagen3']['name'];
move_uploaded_file($_FILES['imagen3']['tmp_name'],$dir_name.$nombre3);
$imagen3=$nombre3;
}else{
$imagen3=$_POST['imagen3_ant'];	
}
if($_FILES['imagen4']['name']!="" && $_FILES['imagen4']['name']!=NULL){
$dir_name = "../../img/floor-plan/";
$nombre4=$dia.$_FILES['imagen4']['name'];
move_uploaded_file($_FILES['imagen4']['tmp_name'],$dir_name.$nombre4);
$imagen4=$nombre4;
}else{
$imagen4=$_POST['imagen4_ant'];	
}
if($_FILES['imagen5']['name']!="" && $_FILES['imagen5']['name']!=NULL){
$dir_name = "../../img/floor-plan/";
$nombre5=$dia.$_FILES['imagen5']['name'];
move_uploaded_file($_FILES['imagen5']['tmp_name'],$dir_name.$nombre5);
$imagen5=$nombre5;
}else{
$imagen5=$_POST['imagen5_ant'];	
}

if($stmt->execute()){echo '<script>
self.location = "../floor-plan.php"
</script>';}




?>



