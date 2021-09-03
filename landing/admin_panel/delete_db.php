<?php
sleep(2);

include('config.php');
include('function.php');
dbConnect();

$query="TRUNCATE TABLE `registro`";
$result= mysql_query($query) or die(mysql_error());
	
	if( $result==1 )
	{
			header("Location: ./index.php");
	}
?>
