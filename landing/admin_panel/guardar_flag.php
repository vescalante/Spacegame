<?php
sleep(2);

include('config.php');
include('function.php');
//dbConnect();
$id_fila	= $_POST['id_fila'];
$status	= $_POST['status'];

			
		//modifica la tabla de clientes
		$Upquery = "UPDATE registro SET ".
		 "flag_cc = '{$status}' ".
	"WHERE ".
		"reg_id = '{$id_fila}'"; 
    	
		$queryresult = mysqli_query($link,$Upquery);

		
		if (!$queryresult) {
				$response_array['status'] = 'error';
				$response_array['message'] = 'Ocurrio un error';
				echo json_encode($response_array);
				
				}else{
					
				$response_array['status'] = 'success';
				$response_array['message'] = 'Se guardaron los cambios';
				echo json_encode($response_array);
		
		}


?>
