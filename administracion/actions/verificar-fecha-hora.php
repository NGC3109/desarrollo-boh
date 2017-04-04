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
     $query="SELECT * FROM reservas WHERE fecha_inicio<=:fecha_inicio AND fecha_fin>=:fecha_fin AND (dia=:dia OR dia=:cero)";
     $stmt= $db->prepare($query);
	 
	 $stmt->bindParam(':fecha_inicio', $fecha_inicio);
	 $stmt->bindParam(':fecha_fin', $fecha_fin);
	 
	 $stmt->bindParam(':dia', $dia);
	 $stmt->bindParam(':cero', $cero);
	 $fecha_inicio=$fecha;
	 $fecha_fin=$fecha;
	 $hin=date('H:i:s',strtotime($hi));
	 $hfn=date('H:i:s',strtotime($hf));
	 
	 $dia=date('N',strtotime($fecha));
	 $cero=0;
	 
	 
	 
	 
	 
	 $query0="SELECT * FROM items WHERE tipo = :tipo AND hora_apertura<=:hora_inicio AND hora_cierre>=:hora_fin";
     $stmt0= $db->prepare($query0);
     $sqlVars[':tipo']=0;
	 $sqlVars[':hora_inicio']=$hora_inicio;
	 $sqlVars[':hora_fin']=$hora_fin;
	 
     if(!$stmt0->execute($sqlVars)){echo "error query 0";}
	 $canchas_b=array();
	 $a=0;
	 
	 if(!$stmt->execute()){echo "error query";}
	 while($cb=$stmt->fetch(PDO::FETCH_ASSOC)){ 
	 
	 $hraInicSol=$hin;
	 $hraFinSol=$hfn;
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
	 
	 while($canchas=$stmt0->fetch(PDO::FETCH_ASSOC)){ 
	 
	 
	 if(in_array($canchas['id'],$canchas_b)==false){
	 $resp.='<label class="btn btn-default margenbtn">
                                          <input type="radio" name="cancha" id="cancha-'.$canchas['id'].'" autocomplete="off" value="'.$canchas['id'].'">'.$canchas['nombre'].'</label>';}
	 
	 }
	 if($resp==""){echo '<div class="alert alert-danger">Todas las canchas están reservadas, intenta en otro horario.</div>';}
	 
	 echo $resp;
		
	}
	
	elseif($hf<$hi){
    echo '<div class="alert alert-danger">Hora de fin debe ser mayor a hora de inicio.</div>';	
	}
	elseif($hi==$hf){
	 echo '<div class="alert alert-danger">Elige las horas.</div>';		
	}
	else{echo '<div class="alert alert-danger">Error! Sólo se puede reservar de a una hora.</div>';}
	
}



?>



