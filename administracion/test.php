<?php 
require_once('connections/db-settings.php');
require_once('connections/getaway.php');
include('load/codigos.php');

		$arreglo = actividadesLoad();
		$old = "x";
		$new = "y";
		$nuevo = "x";
		$anterior = "y";
		$out = "<table border='1'>
						<tr>
							<th>Actividad</th>
							<th>Categoria</th>
							<th>Editar</th>
						</tr>";
		echo "<pre>";
		print_r($arreglo["cantidad"]);
		echo "</pre>";
		
		if (is_array($arreglo)) {
			foreach ($arreglo["actividades"] as $key){ 

		$out .="<tr>"; 
		$new = $key["actividad_id"]."_".$key["categoria_id"];

		if ($new != $old){ 
			$out .= "<td rowspan='".$arreglo[ "cantidad" ][ $key[ "actividad_id" ] ][ $key[ "categoria_id" ] ]."'>".$key['NomActiv']."</td>";
 			}
		$old = $new;
		
		$out .= "<td>".$key['NomCa']."</td>";
		$out .= "<td><i class='fa fa-pencil'></i></td>
		</tr>";



 } 
}
echo "</table>";
echo $out;
?>