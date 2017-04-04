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
	
	$queryreservas="SELECT * FROM reservas WHERE cancha=:cancha AND fecha_inicio<=:fecha_inicio AND fecha_fin>=:fecha_fin AND (dia=:dia OR dia=:cero) ";
     $stmtreservas= $db->prepare($queryreservas);
	 
	 $stmtreservas->bindParam(':cancha', $cancha);
	 $stmtreservas->bindParam(':fecha_inicio', $fecha_inicio);
	 $stmtreservas->bindParam(':fecha_fin', $fecha_fin);
	 $stmtreservas->bindParam(':dia', $dia);
	 $stmtreservas->bindParam(':cero', $cero);
	 $fecha_inicio=$fecha;
	 $fecha_fin=$fecha;
	 $hin=date('H:i:s',strtotime($hi));
	 $hfn=date('H:i:s',strtotime($hf));
	 $cancha=$_POST['cancha'];
	 $dia=date('N',strtotime($fecha));
	 $cero=0;
	 
	 
	 
	 
	 
	 $query0reservas="SELECT * FROM items WHERE id=:id AND tipo = :tipo AND hora_apertura<=:hora_inicio AND hora_cierre>=:hora_fin";
     $stmt0reservas= $db->prepare($query0reservas);
	  
	  $stmt0reservas->bindParam(':id', $id_cancha);
	  $stmt0reservas->bindParam(':tipo', $tipo0r);
	  $stmt0reservas->bindParam(':hora_inicio', $hora_inicio);
	  $stmt0reservas->bindParam(':hora_fin', $hora_fin);
	  
     $tipo0r=0;
	 $id_cancha=$cancha;
     if(!$stmt0reservas->execute()){echo "error query 0";}
	 $canchas_b=array();
	 $a=0;
	 
	 if(!$stmtreservas->execute()){echo "error query";}
	 while($cb=$stmtreservas->fetch(PDO::FETCH_ASSOC)){ 
	 
	 $hraInicSol=$hi;
	 $hraFinSol=$hf;
	 $hraFinRes=date('H:i:s',strtotime($cb['hora_fin']));
	 $hraInicRes=date('H:i:s',strtotime($cb['hora_inicio'])); 
	 
	
	 
	  if($hraInicRes<=$hraInicSol && $hraFinRes>=$hraFinSol)
	  {
		
		array_push($canchas_b, $cb['cancha']);
		  
      }
	  	  
	  elseif($hraInicRes<=$hraInicSol && $hraFinRes<=$hraFinSol && $hraFinRes>$hraInicSol)
	  {
		
		array_push($canchas_b, $cb['cancha']);
		  
      }
	
	  elseif($hraInicRes>=$hraInicSol && $hraFinRes>=$hraFinSol && $hraInicRes<$hraFinSol)
	  {
		
		array_push($canchas_b, $cb['cancha']);
		  
      }
	  
	   
	  }
	  
	  $datos_cancha=$stmt0reservas->fetch(PDO::FETCH_ASSOC);
	 
	 
	 if(in_array($datos_cancha['id'],$canchas_b)){
		 
		 
		 
		 
		 echo '<div class="alert alert-danger">La cancha se reservó en el tiempo que demoraste en reservar.</div>';
		 
		 
		 
		 }
		 else{
			 
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
 $extras_arriendo=array();
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
	 
	 array_push($extras_arriendo, $id_extra);
	 
	 if(!$stmt1->execute()){echo "error query1";}
               $precio_extra=$stmt1->fetch(PDO::FETCH_ASSOC);			
			   
			   $precio+=$precio_extra['precio'];
			
			}
	
	
	
	}
	 
	 
	 
	 
	 
	 $precio+=$precio_cancha['precio'];
	 
	 
	 
	 
	 
	 
	 
	 $queryn="INSERT INTO reservas (nombre, usuario, cancha, extras, fecha_inicio, fecha_fin, hora_inicio, hora_fin, dia, monto) VALUES (:nombre, :usuario, :cancha, :extras, :fecha_inicio, :fecha_fin, :hora_inicio, :hora_fin, :dia, :monto)";

$stmtn=$db->prepare($queryn);

$stmtn->bindParam(':nombre', $nombre);
$stmtn->bindParam(':usuario', $usuario);
$stmtn->bindParam(':cancha', $cancha);
$stmtn->bindParam(':extras', $extras_n);
$stmtn->bindParam(':fecha_inicio', $fecha_inicio_n);
$stmtn->bindParam(':fecha_fin', $fecha_fin_n);
$stmtn->bindParam(':hora_inicio', $hora_inicio_n);
$stmtn->bindParam(':hora_fin', $hora_fin_n);
$stmtn->bindParam(':dia', $dia_n);
$stmtn->bindParam(':monto', $monto);


$nombre=$_POST['nombre'];
$usuario=0;
$cancha=$_POST['cancha'];
$extras_n=implode(', ',$extras_arriendo);
$fecha_inicio_n=$fecha;
$fecha_fin_n=$fecha;
$hora_inicio_n=date('H:i:s',strtotime($hi));
$hora_fin_n=date('H:i:s',strtotime($hf));
$dia_n=date('N',strtotime($fecha));
$monto=$precio;


if($stmtn->execute()){echo '<div class="alert alert-success">Reserva Guardada Correctamente</div>';}
	 else{echo '<div class="alert alert-danger">Hubo un error, por favor intenta de nuevo.</div>';}
			 
			 
		 }
	
		
		
		
		
     
	 
	 
	 
	 
	}
	
	
}



?>



