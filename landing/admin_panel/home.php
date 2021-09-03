<?php
// 
$today = date('d/m/Y');
?>
<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">

			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Redhat <small>panel de administrador para QRs</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Panel de administrador</a>
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
			<!-- END PAGE HEADER-->
            
            <!-- BEGIN DASHBOARD STATS -->
			<div class="row">         
  
                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php

								 $resultPre = mysql_query("SELECT count(*) as registrados FROM registro") or die(mysql_error());
								 
									if(mysql_num_rows($resultPre) > 0){ 
									while($rowPre = mysql_fetch_assoc($resultPre)){
										echo $rowPre['registrados'];
									}
								}else {echo "0";}
								?>
							</div>
							<div class="desc">
								 Total de participantes registrados
							</div>
						</div>
						<a class="more" href="index.php?seccion=usuarios">
						Ver mas <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>  
			</div>
			<!-- END DASHBOARD STATS -->
            
            <!-- BEGIN DASHBOARD STATS -->
			<div class="row">         
  
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-check-circle"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php

								 $resultPre = mysql_query("SELECT count(*) as registrados FROM registro") or die(mysql_error());
								 
									if(mysql_num_rows($resultPre) > 0){ 
									while($rowPre = mysql_fetch_assoc($resultPre)){
										echo $rowPre['registrados'];
									}
								}else {echo "0";}
								?>
							</div>
							<div class="desc">
								 Aceptados gratis
							</div>
						</div>
						<a class="more" href="index.php?seccion=gratis">
						Ver mas <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div> 
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php

								 $resultPre = mysql_query("SELECT count(*) as registrados FROM registro") or die(mysql_error());
								 
									if(mysql_num_rows($resultPre) > 0){ 
									while($rowPre = mysql_fetch_assoc($resultPre)){
										echo $rowPre['registrados'];
									}
								}else {echo "0";}
								?>
							</div>
							<div class="desc">
								 Aceptados con pago
							</div>
						</div>
						<a class="more" href="index.php?seccion=pago">
						Ver mas <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div> 
                
              
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red">
						<div class="visual">
							<i class="fa fa-ban"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php

								 $resultPre = mysql_query("SELECT count(*) as registrados FROM registro") or die(mysql_error());
								 
									if(mysql_num_rows($resultPre) > 0){ 
									while($rowPre = mysql_fetch_assoc($resultPre)){
										echo $rowPre['registrados'];
									}
								}else {echo "0";}
								?>
							</div>
							<div class="desc">
								 Rechazados
							</div>
						</div>
						<a class="more" href="index.php?seccion=rechazados">
						Ver mas <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>  
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-thumbs-o-up"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php

								 $resultPre = mysql_query("SELECT count(*) as registrados FROM registro") or die(mysql_error());
								 
									if(mysql_num_rows($resultPre) > 0){ 
									while($rowPre = mysql_fetch_assoc($resultPre)){
										echo $rowPre['registrados'];
									}
								}else {echo "0";}
								?>
							</div>
							<div class="desc">
								 Confirmados al 100%
							</div>
						</div>
						<a class="more" href="index.php?seccion=alcien">
						Ver mas <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
            
			<!-- graficas -->
			
            <div class="row">
				<div class="col-md-12 col-sm-12">
					<!-- BEGIN PORTLET-->
                    <!--
					<div class="portlet solid bordered grey-cararra">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Cantidad de registrados por fecha
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="../assets/admin/layout/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
                    -->
					<!-- END PORTLET-->
				</div>				
			</div>
			
			<div class="clearfix">
			</div>			

			
		</div>
	</div>
	<!-- END CONTENT -->