<?

$fecha=date('Ymdhis');
$nombre=$_FILES['file']['name'].$fecha;

$dir_name = "../../img/blog/";
    move_uploaded_file($_FILES['file']['tmp_name'],$dir_name.$nombre);
    echo "http://www.regionaltradecenter.cl/img/blog/".$nombre;













?>