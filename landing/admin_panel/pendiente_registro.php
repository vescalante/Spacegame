<?php
sleep(2);

include('config.php');
include('function.php');
include('phpqrcode/qrlib.php');
dbConnect();

$reg_id = isset($_GET["reg_id"]) ? $_GET["reg_id"] : "";

if($reg_id==""){
				header("Location: ./index.php");
}else{	
$result = mysql_query("SELECT * FROM `registro` WHERE `reg_id` = '$reg_id'");

		if ($row = mysql_fetch_array($result)){ 
				$nombre= $row['reg_nombre'];
				$apellido= $row['reg_apellido'];
				$email= $row['reg_email'];
				$qrcode= $row['qrcode'];
				$envios= $row['envios']+1;
				$rejected= '3';
				
				
					//guarda en base de datos
					$Upquery = "UPDATE registro SET ".
					 "envios = '{$envios}', ".
					 "reg_estatus = '{$rejected}' ".
					 "WHERE ".
					 "reg_id = '{$reg_id}'"; 
					
					$queryresult = mysql_query($Upquery);
					
					//envio de notificacion
					
					$admin_nombre = "Red Hat";
					$admin_email = "fiestaredhat2018@eventosdf.mx";
					
					
					include ("config_mail_pendiente.php");
					//Enviar correo con contraseña
					//enviar_correo($fromname, $fromaddress, $toname, $toaddress, $bcc ,$subject, $message)
					
					enviar_correo($admin_nombre,$admin_email,$nombre,$email,'',$espanol_asunto,$espanol_mensaje);
	  
					//Email response
					header("Location: ./index.php");
					
					
				

			
		}else{
				echo "
                <script language='JavaScript'>
                alert('El email pudo no haberse enviado debido a un problema interno');
                </script>";
								        
		}
}

?>
