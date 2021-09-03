<?php
sleep(2);

include('config.php');
include('function.php');
require_once('../assets/vendor/PHPMailerByEndeos/config.php');
//dbConnect();

$reg_id = isset($_GET["reg_id"]) ? $_GET["reg_id"] : "";
$autorizar = isset($_GET["autorizar"]) ? $_GET["autorizar"] : "0";

if($reg_id==""){
				header("Location: ./index.php");
}else{	
$query = "SELECT * FROM `registro` WHERE `reg_id` = '$reg_id'";
$result= mysqli_query($link,$query) or die(mysqli_error());

		if ($row = mysqli_fetch_array($result)){ 
			$nombre= $row['reg_nombre'];
			$apellido= $row['reg_apellido'];
			$email= $row['reg_email'];
			$qrcode= $row['qrcode'];
			$envios= $row['envios']+1;

			//guarda en base de datos
			$Upquery = "UPDATE registro SET ".
			 "envios = '{$envios}', ".
			 "reg_estatus = '{$autorizar}' ".
			 "WHERE ".
			 "reg_id = '{$reg_id}'"; 
			
			$queryresult = mysqli_query($link,$Upquery) or die(mysqli_error());
			
			//--ENVIAR CORREOS POR SMTP

	        $mail->ClearAllRecipients( );

	        $mail->AddAddress($email);
	        //$mail->AddCC("amazzeo@developmentfactor.com.mx");
	        //$mail->AddCC("contacto@servoescolarweb.com");

	        $mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
	        if ($autorizar==1) {
	        	$mail->Subject = 'Tu acceso está listo, ahora puedes ingresar a Tech Sales Training';

		        $msg = "
		        <p>&iexcl;Hola ".$nombre."!</p>
		        <br><br>
		        Hemos generado tu acceso al Tech Sales Training, diseñado por Microsoft y SYNNEX Westcon para que fortalezcas tu proceso de ventas. Ahora puedes ir y disfrutar del contenido. <br><br>
		        <a href='https://www.edgeforazure.com/login.html'>Ir al entrenamiento</a>
		        </p>
		        ";
	        }else if($autorizar==2){
	        	$mail->Subject = 'Solicitaste acceso a Tech Sales Training';

		        $msg = "
		        <p>&iexcl;Hola ".$nombre."!</p>
		        <br><br>
		        Gracias por enviar tu solicitud de acceso para ser parte del Tech Sales Training. Por ahora no nos fue posible incluir tu dirección de correo electr&oacute;nico a nuestro panel de accesos.
		        <br><br>
				Te invitamos a permanecer al tanto de nuestros eventos futuros.

		        </p>
		        ";
	        }

	        $mail->Body    = $msg;
	        $mail->Send();

        //--ENVIAR CORREOS POR SMTP

			header("Location: ./index.php?seccion=detalles&reg_id=$reg_id");
		}else{
				echo "
                <script language='JavaScript'>
                alert('El email pudo no haberse enviado debido a un problema interno');
                </script>";
								        
		}
}

?>
