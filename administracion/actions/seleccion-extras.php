<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['fecha']!=NULL && $_POST['hora_inicio']!=NULL && $_POST['hora_fin']!=NULL){
	
	$fecha=$_POST['fecha'];
	$hora_inicio=$_POST['hora_inicio'];
	$hora_fin=$_POST['hora_fin'];
	
	$hi=date('G:i:s',strtotime($hora_inicio));
	$hf=date('G:i:s',strtotime($hora_fin));
	$resp='';
	if($hf>$hi && (date('G', strtotime($hora_fin))-date('G', strtotime($hora_inicio)))==1 && (date('i', strtotime($hora_fin))-date('i', strtotime($hora_inicio)))==0)
	{
     $query="SELECT * FROM precios WHERE tipo=:tipo AND id_extra=:id_extra AND hora_inicio<=:hora_inicio AND hora_fin>=:hora_fin AND (dia=:dia OR dia=:cero)";
     $stmt= $db->prepare($query);
	 
	 $stmt->bindParam(':tipo', $tipo);
	 $stmt->bindParam(':id_extra', $id_extra);
	 $stmt->bindParam(':hora_inicio', $hin);
	 $stmt->bindParam(':hora_fin', $hfn);
	 $stmt->bindParam(':dia', $dia);
	 $stmt->bindParam(':cero', $cero);
	 $fecha_inicio=$fecha;
	 $fecha_fin=$fecha;
	 $hin=date('H:i:s',strtotime($hi));
	 $hfn=date('H:i:s',strtotime($hf));
	 
	 $dia=date('N',strtotime($fecha));
	 $cero=0;
	 $tipo=1;
	 $id_extra=$_POST['extra'];
	 
	 if(!$stmt->execute()){echo "error query";}
	 $precio=$stmt->fetch(PDO::FETCH_ASSOC);
	 
	 echo '$ '.number_format($precio['precio']);
	 
	}
	
	
}



?>



