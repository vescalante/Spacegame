<!-- GUARDAR DATOS DE LA SECCION PERFIL -->

<!-- LLENAR CAMPOS DEL FORMULARIO -->
<?php
/*
$id_usuario=$_COOKIE["IDADMIN"];
$id_taller=$_GET["id_taller"];

$query = "SELECT * FROM talleres WHERE id_taller = '" . $id_taller . "'";
$result = mysql_query($query);
    
if ($row =  mysql_fetch_assoc($result)) {
    $tema = utf8_encode($row['tema']);
	$fecha = date('d/m/Y ',strtotime($row['fecha']));;
}

mysql_free_result($result);
*/
?> 
<!-- LLENAR DATOS DEL FORMULARIO -->

<!-- AVISOS -->
<div class="modal fade" id="datos_personales" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onClick="window.location.reload()" aria-hidden="true"></button>
				<h4 class="modal-title">En horabuena</h4>
			</div>
			<div class="modal-body" id="mensaje_exito">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn blue" onClick="window.location.reload()">Aceptar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="datos_rechazados" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Error</h4>
			</div>
			<div class="modal-body" id="mensaje_error">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn blue" data-dismiss="modal">Aceptar</button>
			</div>
		</div>
	</div>
</div>
<!-- TERMINA AVISOS -->

<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Importar Base de datos<small> .</small>
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
						<i class="fa fa-angle-right"></i>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
                            	<i class='fa fa-databa'></i>Agregar datos a base existente						
							</div>
						</div>


						<div class="portlet-body flip-scroll">
                            <form id="form" action="post2.php" method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-body">
                                    <div class="form-group">
										<label for="exampleInputFile" class="col-md-3 control-label">*Proyecto:</label>
										<div class="col-md-9">
                                            <input id="archivo" type="file" name="profileImg" required="required">
											<p class="help-block">
												 Sube el archivo de tu proyecto en formato .csv no mayor a 50Mb
											</p>
										</div>
									</div>
									
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button id="submit" type="submit" class="btn green">Enviar</button>
											<button id="borrar" type="button" class="btn default">Borrar</button>
										</div>
									</div>
								</div>
							</form>
						</div>

					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
                
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<div class="clearfix">
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
    
<script>
$("#dia").change(function() { 

    if ( $(this).val() == "20170912") {
    $("#hora_martes").show();
	$("#hora_miercoles").hide();
	$("#hora_jueves").hide();
	
	$("#horamiercoles").val('');
	$("#horajueves").val('');

}
    else if ( $(this).val() == "20170913") {

    $("#hora_martes").hide();
	$("#hora_miercoles").show();
	$("#hora_jueves").hide();
	
	$("#horamartes").val('');
	$("#horajueves").val('');

}
	
	else{

    $("#hora_martes").hide();
	$("#hora_miercoles").hide();
	$("#hora_jueves").show();
	
	$("#horamartes").val('');
	$("#horamiercoles").val('');
    }

});

</script>