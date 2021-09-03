<?php
 session_start();
 
 include('config.php');
 include('function.php');
 //dbConnect();

$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$cat	  = "admin";

$query = "SELECT * FROM `acceso` WHERE `usuario` = '$username' AND  `password` = '$password'";
$result = mysqli_query($link,$query);

		if ($row = mysqli_fetch_array($result)){ 
			$accesos=$row["ingresos"]+1;
			$queryu = "UPDATE `acceso` SET `ingresos` =$accesos, `ultimo_ingreso` =  '".date("Y-m-d H:i:s")."'  WHERE `id_acceso` = {$row['id_acceso']}"; 
			
    			$queryresult = mysqli_query($link,$queryu);
				$user = $row['usuario'];
				$id_acceso = $row['id_acceso'];
			//Cargar cookies
				setcookie("USERADM",$user);
				setcookie("IDADMINADM",$id_acceso);
				$_SESSION['login_admin_adm'] = 1;
				
				$response_array['status'] = 'success';
				$response_array['message'] = 'Bienvenido a tu panel administrador';
				echo json_encode($response_array);
		}else{
		
        		
				$response_array['status'] = 'error';
				$response_array['message'] = 'Usuario o Password Incorrectos';
				echo json_encode($response_array);
        
		}

?>