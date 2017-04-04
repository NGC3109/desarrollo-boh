<?php

require_once('../connections/db-settings.php');

if ($_POST["add"]!=null) {

	generar();
        
        header("Location:../index.php");     
}

function generar(){

	$cantidad = $_POST["cantidad"];
	for ($n=0; $n < $cantidad; $n++) {

		generarCodigo(4);
	}
        
        
}



function generarCodigo($longitud) {
	 $num = 0;
	 $f = "0000-00-00";
	 $fecha=date('Y-m-d');
       
	$a = 0;

		while ( $a == 0) {

			 $db = pdoConnect();
			 $key = '';
			 $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXYZ';
			 $max = strlen($pattern)-1;

			for( $i=0; $i < $longitud; $i++) {
			 
				 $key .= $pattern{mt_rand(0,$max)};
			  }
                        

				$queryco="SELECT * FROM codigos WHERE codigo =:key LIMIT 1";
				$stmtco= $db->prepare($queryco);
                                $stmtco->bindParam(':key', $key);
			    if(!$stmtco->execute()){echo "error query 0";}
				
				$new = 0;

				while ($codigosE=$stmtco->fetch(PDO::FETCH_ASSOC)) {
					$new++;
                                       
				}
                         
			if ($new == 0) {

			$query="INSERT INTO codigos (codigo, idProducto, idUsuario, idVenta, fechaCreacion, fechaActivacion, fechaVencimiento, fechaCobro, estado) 
			VALUES (:codigo, :idProducto, :idUsuario, :idVenta, :fechaCreacion, :fechaActivacion, :fechaVencimiento, :fechaCobro, :estado)";

			$stmt=$db->prepare($query);
			$stmt->bindParam(':codigo', $key);
			$stmt->bindParam(':idProducto', $_POST["idProducto"]);
			$stmt->bindParam(':idUsuario', $num);
			$stmt->bindParam(':idVenta', $num);
			$stmt->bindParam(':fechaCreacion', $fecha);
			$stmt->bindParam(':fechaActivacion', $f);
			$stmt->bindParam(':fechaVencimiento', $f);
			$stmt->bindParam(':fechaCobro', $f);
			$stmt->bindParam(':estado', $num);

			if($stmt->execute()){
		$a++;}

	}
}
	

}

?>

