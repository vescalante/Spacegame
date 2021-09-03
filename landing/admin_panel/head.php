<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>SYNNER Corporation | Admin Panel</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/admin/pages/css/inbox.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->

<link href="../assets/global/css/components.min.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../assets/admin/layout/css/themes/blue.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="../images/favicon.ico"/>

<script type="text/javascript" src="../lib/jquery.1.11.0.min.js"></script>


    <!-- estilo propio -->
    <link rel="stylesheet" type="text/css" href="../css-ant/style_app.css">
    <link rel="stylesheet" type="text/css" href="../css-ant/icons.css">
    
    <!--Caja de Texto HTML -->
    <script src="../js/textboxio/textboxio.js"></script>
    
    <!-- TABLE SORTENER -->
<script type="text/javascript" src="../js/jquery.tablesorter.js"></script>
<link href="../css-ant/themes/blue/style.css" rel="stylesheet" type="text/css"/>


<!-- IMAGE PICKER -->
<script src="../js/image-picker.min.js"></script>
<link href="../css-ant/image-picker.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- light box -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/admin/pages/scripts/ui-alert-dialog-api.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script>
$(function() {
    
 //Array para dar formato en español
  $.datepicker.regional['es'] = 
  {
  closeText: 'Cerrar', 
  prevText: 'Previo', 
  nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
  'Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false};
 $.datepicker.setDefaults($.datepicker.regional['es']);
 
 //miDate: fecha de comienzo D=días | M=mes | Y=año
 //maxDate: fecha tope D=días | M=mes | Y=año
    $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
  });
</script>

<script>
        jQuery(document).ready(function() {       
           UIAlertDialogApi.init();
        });
    </script>

<!-- END JAVASCRIPTS -->

</head>
<!-- END HEAD -->