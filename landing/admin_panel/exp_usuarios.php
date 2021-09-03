<?php
include('config.php');
include('function.php');
//dbConnect();

	$day=date('Y-m-d');
	$v=explode("-",$day);
	$filename="Synnex_DevOps_".$v[2]."_".$v[1]."_".$v[0].".xls";
	
	header("Pragma:no-cache");
	header("Expires:0");
	header("Content-Transfer-Encoding:binary");
	header("Content-Type: application/octet-stream");
	header("Content-type:application/force-download");

   if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")){
		header("Content-Disposition: filename=$filename");
	} else {
		header("Content-Disposition: attachment;filename=$filename");
	}
	
	
	echo "\n<table border='0' width='100%' cellpadding='2' cellspacing='2'>";
	echo "\n<tr>";
	echo "\n<td class='tabla_dato' colspan='9' style='background:#00b2ed; color:#ffffff; padding:14px; font-size:18px'>Usuarios Registrados</td>";
	echo "\n</tr>";
	echo "\n<tr>";	
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Id</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Nombre</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Apellido</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Email</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Empresa</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Cargo</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Celular</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>URL de empresa</td>";
	echo "\n<td class='tabla_etiqueta' style='background:#f1f1f1;border:1px solid #000000'>Actualmente qué proveedor de nube respalda tus desarrollos? </td>";

	echo "\n</tr>";
	
	$query="SELECT * ".
 		   "FROM registro order by reg_id DESC";
		   
	$result= mysqli_query($link,$query) or die(mysqli_error());
	$i=1;
	while( $row=mysqli_fetch_array($result) )
	{
		$estatus_reg= utf8_encode($row[reg_estatus]); 
		switch ($estatus_reg){
			case "0":
				$estatus_regTxt="En espera";
				break;
			case "1":
				$estatus_regTxt="Autorizado";
				break;
			case "2":
				$estatus_regTxt="Rechazado";
				break;
		}
		echo "\n<tr>";		
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>$i</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['reg_nombre']."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['reg_apellidos']."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['reg_email']."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['reg_empresa']."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['reg_puesto']."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['reg_celular']."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['reg_url']."</td>";
		echo "\n<td class='tabla_dato' valign='top' style='border:1px solid #000000'>".$row['reg_preg']."</td>";
		echo "\n</tr>";	
		$i++;
	}
	
	echo "</table>";
		
?>