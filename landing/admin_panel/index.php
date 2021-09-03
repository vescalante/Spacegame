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
   
    <?php 
	$seccion= isset($_GET["seccion"]) ? $_GET["seccion"] : "";
	switch ($seccion) {
    case "":
        include 'lista_usuarios.php';
        break;
    case "aceptados":
        include 'lista_usuarios_aceptados.php';
        break;
    case "pendientes":
        include 'lista_usuarios_pendientes.php';
        break;
    case "rechazados":
        include 'lista_usuarios_rechazados.php';
        break;
    case "usuarios":
        include 'importar_base.php';
        break;
	case "detalles":
        include 'extra_profile_account.php';
        break;	
	}
	?>
    

</div>
<!-- END CONTAINER -->
<?php include 'footer.php';?>
<?php include 'java_lib.php';?>


</body>
<!-- END BODY -->
</html>