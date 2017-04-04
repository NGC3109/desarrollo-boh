<?php 

	$db = pdoConnect();

	$queryco="SELECT 
				COD.codigo,
				COD.idProducto,
				PRO.id,
				PRO.nombre
				FROM codigos AS COD
				INNER JOIN productos AS PRO ON (PRO.id = COD.idProducto)";


	$stmtco= $db->prepare($queryco);
	if(!$stmtco->execute()){echo "error queryr";}

	$querypr="SELECT * FROM productos";
	$stmtpr= $db->prepare($querypr);
	if(!$stmtpr->execute()){echo "error queryr";}

	$queryact="SELECT * FROM actividades";
	$stmtact= $db->prepare($queryact);
	if(!$stmtact->execute()){echo "error queryr";}


	if(isset($_GET['id'])){
		$queryco1="SELECT * FROM codigos WHERE id=:id";
	    $stmtco1= $db->prepare($queryco1); 
		$stmtco1->bindParam(':id', $_GET['id']);
	    if(!$stmtco1->execute()){echo "error query 0";}
		$codigosE=$stmtco1->fetch(PDO::FETCH_ASSOC);
	}

/* TEST */

function actividadesLoad(){

	$conexion = mysqli_connect("localhost", "root", "","getaway") or die(mysqli_error()) ;

	$querydet="SELECT 

	D.id AS detalle_id,
	D.idCategoria,
	D.idActividades,

	C.id AS categoria_id,
	C.nombre AS NomCa,

	A.id AS actividad_id,
	A.nombre AS NomActiv

	FROM detalle_act_cat AS D 

	INNER JOIN actividades AS A ON (A.id = D.idActividades)
	INNER JOIN categorias AS C ON (C.id = D.idCategoria)";

	$resultado = mysqli_query($conexion, $querydet);

	$i = 0;
	while( $file = mysqli_fetch_array( $resultado ) ){
		$arreglo[ "actividades" ][ $i ] = array( 
				"NomActiv"    	=> $file[ "NomActiv" ],
				"actividad_id"    	=> $file[ "actividad_id" ],
				"NomCa"    	=> $file[ "NomCa" ],
				"categoria_id"    	=> $file[ "categoria_id" ]
			);

		@$arreglo[ "cantidad" ][ $fila[ "actividad_id" ] ][ $fila[ "categoria_id" ] ] += 1;

		$i++;
	}
	    mysqli_free_result( $resultado );
	  mysqli_close( $conexion );
	return @$arreglo;

}

?>