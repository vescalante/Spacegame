<?php

/*
*
* Endeos, Working for You
* blog.endeos.com
*
*/

require_once('PHPMailerAutoload.php');


$mail = new PHPMailer;

//$mail->SMTPDebug    = 3;

$mail->IsSMTP();
$mail->Host = 'smtp.office365.com';   /*Servidor SMTP*/																		
$mail->SMTPSecure = 'TLS';   /*Protocolo SSL o TLS*/
$mail->Port = 587;   /*Puerto de conexión al servidor SMTP*/
$mail->SMTPAuth = true;   /*Para habilitar o deshabilitar la autenticación*/
$mail->Username = 'tumision@cyberdefensegame.com';   /*Usuario, normalmente el correo electrónico*/
$mail->Password = 'Mision2020*';   /*Tu contraseña*/
$mail->From = 'tumision@cyberdefensegame.com';   /*Correo electrónico que estamos autenticando*/
$mail->FromName = 'Palo Alto';   /*Puedes poner tu nombre, el de tu empresa, nombre de tu web, etc.*/
$mail->CharSet = 'UTF-8';   /*Codificación del mensaje*/

?>