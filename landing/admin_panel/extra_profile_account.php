<!-- GUARDAR DATOS DE LA SECCION PERFIL -->
<script>

      $(function () {
        $('#submit').bind('click', function (event) {

		   event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            	type: 'POST',
            	url: 'actualizar_user.php',
            	data: $('form').serialize(),
				dataType: "json",
				success: function(data) {

                  if(data.status == "success"){
                 	  $("#datos_personales").modal("show");
					  $("#mensaje_exito").empty();
					  $("#mensaje_exito").append(data.message);
                  }
                  else if(data.status == "error"){
					  $("#datos_rechazados").modal("show");
					  $("#mensaje_error").empty();
					  $("#mensaje_error").append(data.message);
                  }

               }
        	});
        });
      });

</script>
<!-- GUARDAR DATOS DE LA SECCION PERFIL -->

<!-- LLENAR CAMPOS DEL FORMULARIO -->
<?php
$id_usuario=$_GET["reg_id"];
$query = "SELECT * FROM registro WHERE reg_id = '" . $id_usuario . "'";
$result = mysqli_query($link,$query);
    
if ($row =  mysqli_fetch_assoc($result)) {
    $origen 	= $row['reg_origen'];
    $nombre		=$row["reg_nombre"];
	$apellidos	=$row["reg_apellidos"];
	$email		=$row["reg_email"];
	$empresa	=$row["reg_empresa"];
	$puesto		=$row["reg_puesto"];
	$celular	=$row["reg_celular"];
	$url		=$row["reg_url"];
	$preg		=$row["reg_preg"];
	$estatus	=$row["reg_estatus"];
	$dato = $row['reg_origen'];
	$envios = $row['envios'];

	switch ($estatus){
		case "0":
			$estatus_regTxt="En espera";
			break;
		case "1":
			$estatus_regTxt="Aceptado";
			break;
		case "2":
			$estatus_regTxt="Rechazado";
			break;
	}
}

mysqli_free_result($result);
?> 
<!-- LLENAR DATOS DEL FORMULARIO -->

<!-- AVISOS -->
<div class="modal fade" id="datos_personales" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onClick="window.location.reload()" aria-hidden="true"></button>
				<h4 class="modal-title">Success</h4>
			</div>
			<div class="modal-body" id="mensaje_exito">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn blue" onClick="parent.location='index.php'">Accept</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="datos_rechazados" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onClick="window.location.reload()" aria-hidden="true"></button>
				<h4 class="modal-title">Error</h4>
			</div>
			<div class="modal-body" id="mensaje_error">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn blue" onClick="parent.location='index.php'">Accept</button>
			</div>
		</div>
	</div>
</div>
<!-- TERMINA AVISOS -->

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->			
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Registro</a>
						<i class="fa fa-angle-right"></i>
					</li>
				</ul>				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<img src='../assets/admin/layout/img/anonimo.png' class="img-responsive" alt=''>
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									 <?php echo $nombre?>
								</div>
								<div class="profile-usertitle-job">
									 <?php echo $email?>
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->

						</div>
						<!-- END PORTLET MAIN -->
						
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Datos</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Información Personal</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_1">
												<form role="form" action="#" id="form1">													

                                                    <div class="form-group">
														<label class="control-label">Nombre</label>
														<input type="text" placeholder="Nombre" class="form-control" name="nombre" value="<?php echo $nombre;?>" readonly="readonly">
													</div> 

													<div class="form-group">
														<label class="control-label">Apellido</label>
														<input type="text" placeholder="Apellido" class="form-control" name="apellidos" value="<?php echo $apellidos;?>" readonly="readonly">
													</div> 

                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id_usuario" value="<?php echo $id_usuario?>" readonly="readonly">
                                                        
                                                        <label class="control-label">Email</label>
														<input type="text" placeholder="anonimo@cuenta.com.mx" class="form-control" name="email" value="<?php echo $email?>" readonly="readonly">
													</div> 

													<div class="form-group">
														<label class="control-label">Empresa</label>
														<input type="text" placeholder="Empresa" class="form-control" name="empresa" value="<?php echo $empresa;?>" readonly="readonly">
													</div> 

													<div class="form-group">
														<label class="control-label">Cargo</label>
														<input type="text" placeholder="Cargo" class="form-control" name="puesto" value="<?php echo $puesto;?>" readonly="readonly">
													</div> 

													<div class="form-group">
														<label class="control-label">Celular</label>
														<input type="text" placeholder="Celular" class="form-control" name="celular" value="<?php echo $celular;?>" readonly="readonly">
													</div> 

													<div class="form-group">
														<label class="control-label">URL de Empresa</label>
														<input type="text" placeholder="URL de Empresa" class="form-control" name="url" value="<?php echo $url;?>" readonly="readonly">
													</div> 

													<div class="form-group">
														<label class="control-label">¿Actualmente qué proveedor de nube respalda tus desarrollos?  </label>
														<input type="text" placeholder="Pregunta" class="form-control" name="preg" value="<?php echo $preg;?>" readonly="readonly">
													</div> 
													
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->
                                            
                                            										
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->