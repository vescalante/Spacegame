<script>
$( document ).ready(function() {
	$("#myTable").tablesorter();
	var $rows = $('#table tr');
	$('#search').keyup(function() {
		var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
		
		$rows.show().filter(function() {
			var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
			return !~text.indexOf(val);
		}).hide();
	});
	
	$(function() {
		  $('.displayme').change(function() {
			if (this.checked){
			  console.log(this.value);
			  $("#check-td"+this.value).addClass('yellow');
			  $("#check1-td"+this.value).addClass('yellow');
			  $("#check2-td"+this.value).addClass('yellow');
			  $("#check3-td"+this.value).addClass('yellow');
			  $("#check4-td"+this.value).addClass('yellow');
			  $("#check5-td"+this.value).addClass('yellow');
			  $("#check6-td"+this.value).addClass('yellow');
			  $("#check7-td"+this.value).addClass('yellow');
			  $("#check9-td"+this.value).addClass('yellow');
			  $("#check10-td"+this.value).addClass('yellow');
			  
			  $.ajax({
            	type: 'POST',
            	url: 'guardar_flag.php',
            	data: {id_fila: this.value, status: "1"},
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
			  
			  
			}else if (!this.checked) {
				console.log(this.value);
			  $("#check-td"+this.value).removeClass("yellow");
			  $("#check1-td"+this.value).removeClass("yellow");
			  $("#check2-td"+this.value).removeClass("yellow");
			  $("#check3-td"+this.value).removeClass("yellow");
			  $("#check4-td"+this.value).removeClass("yellow");
			  $("#check5-td"+this.value).removeClass("yellow");
			  $("#check6-td"+this.value).removeClass("yellow");
			  $("#check7-td"+this.value).removeClass("yellow");
			  $("#check9-td"+this.value).removeClass("yellow");
			  $("#check10-td"+this.value).removeClass("yellow");
			  
			  $.ajax({
            	type: 'POST',
            	url: 'guardar_flag.php',
            	data: {id_fila: this.value, status: "0"},
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
			
			}
		  });
		});	

   
});

</script>
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Lista de registros<small> .</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Inicio</a>
						<i class="fa fa-angle-right"></i>
                        <a href="#">Lista de rechazados</a>
                        <i class="fa fa-angle-right"></i>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
            	<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
                    <?php
						$sql = "SELECT COUNT(*) FROM registro WHERE reg_estatus='3'";
						$result = mysql_query($sql) or trigger_error("SQL", E_USER_ERROR);
						$r = mysql_fetch_row($result);
						$numrows = $r[0];
						
						// number of rows to show per page
						$rowsperpage = 20;
						// find out total pages
						$totalpages = ceil($numrows / $rowsperpage);
						
						// get the current page or set a default
						if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
						   // cast var as int
						   $currentpage = (int) $_GET['currentpage'];
						} else {
						   // default page num
						   $currentpage = 1;
						} // end if
						
						// if current page is greater than total pages...
						if ($currentpage > $totalpages) {
						   // set current page to last page
						   $currentpage = $totalpages;
						} // end if
						// if current page is less than first page...
						if ($currentpage < 1) {
						   // set current page to first page
						   $currentpage = 1;
						} // end if
						
						// the offset of the list, based on current page 
						$offset = ($currentpage - 1) * $rowsperpage;
					?>
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i> Total de registros: <?php echo $numrows; ?>
							</div>

						</div>
                        <div class="portlet-body flip-scroll">
                        <?php					
							$query = "SELECT * FROM registro WHERE reg_estatus='3' ".
            						 "order by reg_id DESC ".
									 "LIMIT $offset, $rowsperpage";
									 									
							$result2 = mysql_query($query) or die(mysql_error());
							if(mysql_num_rows($result2) > 0){
						?>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content tablesorter">
							<thead class="flip-content">
                            <tr>
                            	<tr colspan="7">                                
                                <div class="form-group">
										<label class="control-label">Buscar:</label>
                                        <input type="text" id="search" placeholder="Escriba para buscar" class="form-control"/>
								</div>
                                </tr>
                            </tr>
							<tr>
                            	<th></th>
                                <th width="5%">
									 No.
								</th>
								<th width="12%">
									 Nombre
								</th>
                                <th width="12%">
									 Apellido
								</th>
                                <th width="15%">
									 Email
								</th>
                                <th width="11%">
									 Empresa
								</th>                                
                                <th width="10%">
									 Envios
								</th>
								<th width="10%">
									 Estatus
								</th>
                                <th colspan="2">
                                	 Edición
								</th>
							</tr>
							</thead>
							<tbody id="table">
                            <?php 
								$i=1; 
								while($row2 = mysql_fetch_assoc($result2)){ 	
									$check =	$row2['flag_cc'];	
									$estatus_reg= utf8_encode($row2['reg_estatus']); 
									switch ($estatus_reg){
										case "0":
											$estatus_regTxt="No visto";
											break;
										case "1":
											$estatus_regTxt="Aceptado";
											break;
										case "2":
											$estatus_regTxt="Rechazado";
											break;
										case "3":
											$estatus_regTxt="Pendiente";
											break;
									}

							?>
							<tr>
                            	<?php if ($check =="0"){ ?>
                                
                            	<td  id="check-td<?php echo $row2['reg_id']; ?>">
	                                	<input type="checkbox" name="ids[]" class="displayme" value="<?php echo $row2['reg_id']; ?>">
                                </td>
                                
                            	<td id="check1-td<?php echo $row2['reg_id']; ?>">
									 <?php echo $row2['reg_id']; ?>
								</td>                                
								<td id="check2-td<?php echo $row2['reg_id']; ?>">
									  <?php echo utf8_encode($row2['reg_nombre']); ?>
								</td>
                                <td id="check3-td<?php echo $row2['reg_id']; ?>">
									  <?php echo utf8_encode($row2['reg_apellido']); ?>
								</td>
                                <td id="check4-td<?php echo $row2['reg_id']; ?>">
									  <?php echo utf8_encode($row2['reg_email']); ?>
								</td>
                                <td id="check5-td<?php echo $row2['reg_id']; ?>">
									  <?php echo utf8_encode($row2['reg_empresa']); ?>
								</td>                                
                                <td id="check6-td<?php echo $row2['reg_id']; ?>">
									 <?php echo utf8_encode($row2['envios']); ?>
								</td>
								<td id="check7-td<?php echo $row2['reg_id']; ?>">
									 <?php 

									 	echo $estatus_regTxt; 
									 ?>
								</td>
                                <td id="check9-td<?php echo $row2['reg_id']; ?>">
									 <a href="index.php?seccion=detalles&amp;reg_id=<?php echo $row2['reg_id']; ?>"><i class='fa fa-eye'></i> Ver</a>
								</td>
                                <td id="check10-td<?php echo $row2['reg_id']; ?>">
									 <a href="borrar_reg.php?reg_id=<?php echo $row2['reg_id']; ?>" onclick="javascript: return confirm('Esta accion borrará el registro. ¿Desea continuar?');"><i class='fa fa-trash'></i> Borrar</a>
								</td>
                                							                   
							</tr>
                            
                            <!-- Aqui -->
                            <?php }else{ ?>
                            
                            <tr>
                            	<td  id="check-td<?php echo $row2['reg_id']; ?>" class="yellow">
	                                	<input type="checkbox" name="ids[]" class="displayme" value="<?php echo $row2['reg_id']; ?>" checked="checked">
                                </td>
                            	<td id="check1-td<?php echo $row2['reg_id']; ?>" class="yellow">
									 <?php echo $row2['reg_id']; ?>
								</td>                                
								<td id="check2-td<?php echo $row2['reg_id']; ?>" class="yellow">
									  <?php echo utf8_encode($row2['reg_nombre']); ?>
								</td>
                                <td id="check3-td<?php echo $row2['reg_id']; ?>" class="yellow">
									  <?php echo utf8_encode($row2['reg_apellido']); ?>
								</td>
                                <td id="check4-td<?php echo $row2['reg_id']; ?>" class="yellow">
									  <?php echo utf8_encode($row2['reg_email']); ?>
								</td>
                                <td id="check5-td<?php echo $row2['reg_id']; ?>" class="yellow">
									  <?php echo utf8_encode($row2['reg_empresa']); ?>
								</td>                               
                                <td id="check6-td<?php echo $row2['reg_id']; ?>" class="yellow">
									 <?php echo utf8_encode($row2['envios']); ?>
								</td>
								<td id="check7-td<?php echo $row2['reg_id']; ?>" class="yellow">
									 <?php echo $estatus_regTxt; ?>
								</td>
                                <td id="check9-td<?php echo $row2['reg_id']; ?>" class="yellow">
                                	  <a href="index.php?seccion=detalles&amp;reg_id=<?php echo $row2['reg_id']; ?>"><i class='fa fa-eye'></i> Ver</a>
                                </td>
                                <td id="check10-td<?php echo $row2['reg_id']; ?>" class="yellow">
                                	  <a href="borrar_reg.php?reg_id=<?php echo $row2['reg_id']; ?>" onclick="javascript: return confirm('Esta accion borrará el registro. ¿Desea continuar?');"><i class='fa fa-trash'></i> Borrar</a>
                                </td>							                   
							</tr>
                            
                            
                            <?php } $i=$i+1; } ?>							
							</tbody>
							</table>
                            <div class="pagination">
							<?php 
							 /******  build the pagination links ******/
							// range of num links to show
							$range = 6;
							
							// if not on page 1, don't show back links
							if ($currentpage > 1) {
							   // show << link to go back to page 1
							   echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=1'>&laquo;</a> ";
							   // get previous page num
							   $prevpage = $currentpage - 1;
							   // show < link to go back to 1 page
							   echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'>Anterior</a> ";
							} // end if 
							
							// loop to show links to range of pages around current page
							for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
							   // if it's a valid page number...
							   if (($x > 0) && ($x <= $totalpages)) {
								  // if we're on current page...
								  if ($x == $currentpage) {
									 // 'highlight' it but don't make a link
									 echo "<a class='active' href='#'>$x</a> ";
								  // if not current page...
								  } else {
									 // make it a link
									 echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
								  } // end else
							   } // end if 
							} // end for
							
							// if not on last page, show forward and last page links        
							if ($currentpage != $totalpages) {
							   // get next page
							   $nextpage = $currentpage + 1;
								// echo forward link for next page 
							   echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>Siguiente</a> ";
							   // echo forward link for lastpage
							   echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>&raquo;</a> ";
							} // end if
							/****** end build pagination links ******/
		 					?>
                            </div>
                            <?php }else{ ?>
                            <div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<tbody>
                            <tr>
								<td colspan="2">
									 Por ahora no hay registros.
								</td>
							</tr>
							</tbody>
							</table>                             
                            <?php } ?>
						</div>
					</div>
					</div>
            	
                
                

				</div><!-- Row -->
                
				<!-- Row -->
			<div class="clearfix">
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->