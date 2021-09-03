<?php
	session_start();
	if(!isset($_SESSION['login_admin_adm'])){
				?>
				<script type="text/javascript">
            		window.location.href = "login.php"
        		</script>
                <?php 
     }
?>
<?php include 'head.php';?>
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">

<?php include 'header.php';?>

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
<?php include 'sidebar.php';?>
   
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">

			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Importar Base de datos
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="index.php?seccion=usuarios">Importar base</a>
					</li>
				</ul>
                <!--
				<div class="page-toolbar">
					<div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp;
						<i class="fa fa-angle-down"></i>
					</div>
				</div>
                -->
			</div>
			
            <div class="row">
            	<div class="col-md-12 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box green ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-loading"></i> Subiendo base de datos
							</div>
						</div>
						<div class="portlet-body">
                        <?php
						//AQUI
						
						//EVENTO
$today = date('Y-m-d H:i:s');
$equipo= $_COOKIE["EQUIPO"];

if(!isset($_FILES['profileImg'])){
			?>
			<script>
				setTimeout(function () {
			  	window.history.go(-1); // the redirect goes here
				},10000); // 5 seconds
			</script>
            
				<div class="note note-warning">
					<h4 class="block">Error de archivo:</h4>
						<p>
							El archivo esta vacio, Seleccione un archivo que pueda ser procesado. 
						</p>
				</div>
			<?php
			
}else{

$fileName = $_FILES['profileImg']['name'];
$tmpName  = $_FILES['profileImg']['tmp_name'];
$fileSize = $_FILES['profileImg']['size'];
$fileType = $_FILES['profileImg']['type'];

$mimes = array(    		
		'text/plain',
		'application/vnd.ms-excel',
		'text/x-csv'
);


//hace update para subir la imagen		

		$random_digit=rand(000,999);
		$new_fileName=str_replace(" ",'_',$random_digit.$fileName);
		$new_fileName=utf8_decode($new_fileName);
	
		$uploaddir = '/uploads/';
		$uploadfile = $uploaddir . basename($new_fileName);
		
		if (!in_array($fileType,$mimes)or($fileSize > 50000000)) {
		//filtro para saber si el archivo pesa mas de 1Mb o no corresponde a la extencion
    	?>
			<script>
				setTimeout(function () {
			  	window.history.go(-1); // the redirect goes here
				},10000); // 5 seconds
			</script>
            
				<div class="note note-danger">
					<h4 class="block">Error de formato:</h4>
						<p>
							Existe un problema con el archivo, verifica que tu archivo sea CSV delimitado por comas y que no exceda el limite de 50Mb. 
						</p>
				</div>
						
			<?php
}else{
	//if (move_uploaded_file($tmpName, $uploadfile)) {
		
		 $file = $_FILES['profileImg']['tmp_name'];
		 $handle = fopen($file, "r");
		 $c = 0;
		 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		 {
		 $origen = $filesop[0];
		 $nombre = $filesop[1];
		 $apellido = $filesop[2];
		 $email = $filesop[3];
		 $empresa = $filesop[4];
		 $puesto = $filesop[5];
		 $telefono = $filesop[6];
		 
		 $sql = mysql_query("INSERT INTO registro (reg_origen,reg_nombre,reg_apellido,reg_email,reg_empresa,reg_puesto,reg_telefono) VALUES ('$origen','$nombre','$apellido','$email','$empresa','$puesto','$telefono')");
		 }
		 
		 /*
		 if($sql){
		 echo "La base de datos se cargo correctamente";
		 }else{
		 echo "Lo sentimos, hubo un problema.";
		 }
		*/	
		
		if (!$sql) {			
			
				$array['success'] = FALSE;
				echo json_encode($array);
				
				}else{				
				
				?>
                	<script>
						setTimeout(function () {
			  			window.location.href= 'index.php'; // the redirect goes here
						},10000); // 5 seconds
					</script>

            
				<div class="note note-success">
					<h4 class="block">En horabuena:</h4>
						<p>
							La base de datos se cargo correctamente, ahora estas siendo redirigido al inicio. <br /><br />
                            <img src="images/saving.gif" width="182" />
						</p>
				</div>

    <?php
		
				}
	}
  }
//}




						//HASTA AQUI
						?>
						</div>
					</div>                    
					<!-- END PORTLET-->
				</div>				
			</div>
			
			<div class="clearfix">
			</div>			

			
		</div>
	</div>
	<!-- END CONTENT -->





    

</div>
<!-- END CONTAINER -->
<?php include 'footer.php';?>
<?php include 'java_lib.php';?>

</body>
<!-- END BODY -->
</html>