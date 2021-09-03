     <?php
####################################################################################################

$nombreMail= $nombre;
$apellidoMail= $apellido;

$result2 = mysql_query("SELECT * FROM `registro` WHERE `reg_id` = '$reg_id'");

		if ($row2 = mysql_fetch_array($result2)){ 
				$qr_def= $row2['qrcode'];
		}

$asunto_fijo="¡Bienvenido A ITPC 2019!";
$espanol_asunto = '=?UTF-8?B?'.base64_encode($asunto_fijo).'?=';

$espanol_mensaje="
<html>
<head>
<title>Red Hat | 2018</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
</head>
<body bgcolor='#cacaca' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<!-- Save for Web Slices (bl1_adobe_DM_7Jul.psd) -->
<center>
<table id='Table_01' width='600' border='0' cellpadding='0' cellspacing='0' style='background:#FFF'>
    <tr>
        <td colspan='3'>
            <img src='http://www.proyectosdevelopmentfactor.com/intel/itpc/registro/images/email_header.jpg' width='600' height='103' alt=''></td>
    </tr>
    <tr>
        <td colspan='3' height='40'>
        </td>
    </tr>
    <tr>
        <td width='30'>
        </td>
        
        <td width='538' bgcolor='#ffffff' align='center'>
            <table border='0' cellpadding='0' cellspacing='0' width='83%'>
                <tr>
                    <td style='font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333333; text-align:left'>
                    <p style='text-align: center'>
<strong style='color:#0071c5'>Apreciable ".$nombreMail.":</strong>

<br><br>
Este es tu c&oacute;digo de acceso para ITPC 2019.

<br><br>
<img src='http://www.proyectosdevelopmentfactor.com/intel/itpc/admin_panel/phpqrcode/temp/qrcode-".$qr_def.".png' width='125' height='125' alt=''><br>
<strong style='font-size:17px'>".$qr_def."</strong>
<br><br>

Pres&eacute;ntalo el d&iacute;a del evento y vive todo el poder de la innovaci&oacute;n de Intel, donde conocer&aacute;s la mejor tecnolog&iacute;a del futuro.
<br><br>
Te esperamos el pr&oacute;ximo <strong>11 de julio, a las 08:00 hrs</strong>, <br>
en el Hotel Hyatt Regency.

<br><br>
<span style='font-size:11px'>
Invitaci&oacute;n personal e intransferible.<br>
Cupo limitado.
</span>

</p>
                    </td>
                </tr>
            </table>
        </td>
        
        <td width='32'>
        </td>
    </tr>
    <tr>
        <td colspan='3' width='600' height='30'>
        </td>
    </tr>
    <tr>
        <td colspan='3' width='600' height='30' bgcolor='#0071c5'>
        </td>
    </tr>
        
</table>
</center>
<!-- End Save for Web Slices -->
</body>
</html>";

?>
