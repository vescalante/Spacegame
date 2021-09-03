<?php
sleep(2);

include('config.php');
include('function.php');
//dbConnect();
$name	= $_POST['search'];

			
		//modifica la tabla de clientes
		$Upquery = "SELECT * FROM registro WHERE reg_nombre LIKE '%$name%' OR reg_email LIKE '%$name%' LIMIT 5"; 
    	
		$queryresult = mysqli_query($link,$Upquery);
		echo '<ul>';
	   	while ($result = mysqli_fetch_array($queryresult)) {
	   		?>
	   		<li onclick='fill("<?php echo $result['reg_nombre']; ?>")'>
	   			<a href="index.php?seccion=detalles&amp;reg_id=<?php echo $result['reg_id']; ?>">
	   				<?php echo utf8_encode($result['reg_nombre'].' '.$result['reg_apellido'].' ('.$result['reg_email'].')'); ?></a>
	   		</li>
	 	<?php 
	    }
	    echo '</ul>';
	    ?>
