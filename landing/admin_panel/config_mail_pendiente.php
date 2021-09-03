     <?php
####################################################################################################
$admin_nombre = "Red Hat";
$admin_email = "fiestaredhat2018@eventosdf.mx";

$nombreMail= $nombre;
$apellidoMail= $apellido;

$result2 = mysql_query("SELECT * FROM `registro` WHERE `reg_id` = '$reg_id'");

		if ($row2 = mysql_fetch_array($result2)){ 
				$qr_def= $row2['qrcode'];
		}

$asunto_fijo="IMPORTANTE: Información sobre tu registro";
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
            <img src='http://www.proyectosdevelopmentfactor.com/redhat/fiesta2018/registro/images/redhat_header.jpg' width='600' height='103' alt=''></td>
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
                    <strong>Registro pendiente</strong><br>
<strong style='color:#0071c5'>Apreciable ".$nombreMail." ".$apellidoMail.":</strong>
<br><br>
Tu registro ha entrado a la lista de espera. En caso de tener disponibilidad nos pondremos en contacto contigo a la brevedad. 
<br><br>
&iexcl;Que pases un excelente d&iacute;a!


<br><br>
<img src='http://www.proyectosdevelopmentfactor.com/redhat/qrcode/registro/images/redhat_logo.png' width='100' height='40' alt=''>

<br><br>

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
        <td colspan='3' width='600' height='30' bgcolor='#bd1a29'>
        </td>
    </tr>
        
</table>
</center>
<!-- End Save for Web Slices -->
</body>
</html>";

?>
