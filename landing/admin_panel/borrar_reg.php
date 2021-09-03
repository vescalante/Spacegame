<?php
sleep(2);

include('config.php');
include('function.php');
//dbConnect();

$query="delete from registro where reg_id='$_GET[reg_id]'";
$result= mysqli_query($link,$query) or die(mysqli_error());
	
	if( $result==1 )
	{
			header("Location: ./index.php");
	}
?>
