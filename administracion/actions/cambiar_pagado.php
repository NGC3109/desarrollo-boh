<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE reservas SET estado=:estado WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':estado', $estado);


$id=$_POST['id'];
$estado=$_POST['estado'];


if($stmt->execute()){
	if($estado==0){echo '<option value="0">En bodega</option><option value="1">En camino</option><option value="2">En el destino</option><option value="3">Finalizado</option><option value="10">Cancelado</option>';}
	elseif($estado==1){echo '<option value="1">En camino</option><option value="2">En el destino</option><option value="3">Finalizado</option><option value="10">Cancelado</option><option value="0">En bodega</option>';}
	elseif($estado==2){echo '<option value="2">En el destino</option><option value="3">Finalizado</option><option value="10">Cancelado</option><option value="0">En bodega</option><option value="1">En camino</option>';}
	elseif($estado==3){echo '<option value="3">Finalizado</option><option value="2">En el destino</option><option value="10">Cancelado</option><option value="0">En bodega</option><option value="1">En camino</option>';}
	elseif($estado==10){echo '<option value="10">Cancelado</option><option value="0">En bodega</option><option value="1">En camino</option><option value="2">En el destino</option><option value="3">Finalizado</option>';}
	else{ echo "Algo salió mal...";}

}

?>



