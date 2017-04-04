<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$precio=0;

if($_POST['fecha']!=NULL && $_POST['hora_inicio']!=NULL && $_POST['hora_fin']!=NULL){
	
	$fecha=$_POST['fecha'];
	$hora_inicio=$_POST['hora_inicio'];
	$hora_fin=$_POST['hora_fin'];
	
	$hi=date('G:i:s',strtotime($hora_inicio));
	$hf=date('G:i:s',strtotime($hora_fin));
	$resp='';
	if($hf>$hi && (date('G', strtotime($hora_fin))-date('G', strtotime($hora_inicio)))==1 && (date('i', strtotime($hora_fin))-date('i', strtotime($hora_inicio)))==0)
	{
     $query="SELECT * FROM precios WHERE tipo=:tipo AND hora_inicio<=:hora_inicio AND hora_fin>=:hora_fin AND (dia=:dia OR dia=:cero)";
     $stmt= $db->prepare($query);
	 
	 $stmt->bindParam(':tipo', $tipo);
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
	 $tipo=0;
	 
	 if(!$stmt->execute()){echo "error query";}
	 $precio_cancha=$stmt->fetch(PDO::FETCH_ASSOC);
	 
	 
	 $query0="SELECT * FROM items WHERE tipo = :tipo";
$stmt0= $db->prepare($query0);
$sqlVars[':tipo']=1;
if(!$stmt0->execute($sqlVars)){echo "error query 0";}

    while($extras_sc=$stmt0->fetch(PDO::FETCH_ASSOC)){
		
		$id=$extras_sc['id'];
		
		if($_POST['extra-'.$id]=="1"){
			
			 $query1="SELECT * FROM precios WHERE tipo=:tipo AND id_extra=:id_extra AND hora_inicio<=:hora_inicio AND hora_fin>=:hora_fin AND (dia=:dia OR dia=:cero)";
     $stmt1= $db->prepare($query1);
	 
	 $stmt1->bindParam(':tipo', $tipo);
	 $stmt1->bindParam(':id_extra', $id_extra);
	 $stmt1->bindParam(':hora_inicio', $hin);
	 $stmt1->bindParam(':hora_fin', $hfn);
	 $stmt1->bindParam(':dia', $dia);
	 $stmt1->bindParam(':cero', $cero);
	 $fecha_inicio=$fecha;
	 $fecha_fin=$fecha;
	 $hin=date('H:i:s',strtotime($hi));
	 $hfn=date('H:i:s',strtotime($hf));
	 
	 $dia=date('N',strtotime($fecha));
	 $cero=0;
	 $tipo=1;
	 $id_extra=$id;
	 
	 if(!$stmt1->execute()){echo "error query1";}
               $precio_extra=$stmt1->fetch(PDO::FETCH_ASSOC);			
			   
			   $precio+=$precio_extra['precio'];
			
			}
	
	
	
	}
	 
	 
	 
	 
	 
	 $precio+=$precio_cancha['precio'];
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 echo '$ '.number_format($precio);
	 
	}
	
	
}



?>



