<?php
 session_start();
 
 include('config.php');
 include('function.php');
 //dbConnect();

$username = isset($_POST["login"]) ? $_POST["login"] : "";
$cat	  = "user";
date_default_timezone_set("America/Mexico_City");

$query = "SELECT * FROM `registro` WHERE `reg_email` = '$username'";
$result = mysqli_query($link,$query);

		if ($row = mysqli_fetch_array($result)){ 
				$user = $row['reg_email'];
				$alias = $row['reg_alias'];
				$avatar = $row['reg_avatar'];
				$intentos = $row['reg_intentos'];
				$id_acceso = $row['qrcode'];
			//Cargar cookies
				setcookie("USER",$user);
				setcookie("ALIAS",$alias);
				setcookie("AVATAR",$avatar);
				setcookie("INTENTOS",$intentos);
				setcookie("IDUSER",$id_acceso);
				$_SESSION['login_usr'] = 1;
				
				$response_array['status'] = 'success';
				$response_array['message'] = 'Bienvenido, ya puedes jugar';
				echo json_encode($response_array);
		}else{
		
        		
				$response_array['status'] = 'error';
				$response_array['message'] = 'Correo incorrecto o no registrado';
				echo json_encode($response_array);
		}

?>