<?php
  session_start();
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  //------------------------------------------------------------------
  /**
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];
  */
  //------------------------------------------------------------------
  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */
  //------------------------------------------------------------------
  /*
  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
  */
  //------------------------------------------------------------------
 include('../config.php');
 include('../function.php');
 require_once('../assets/vendor/PHPMailerByEndeos/config.php');
 //dbConnect();

$today = date('Y-m-d H:i:s');
$reg_origen = "WEBFORM";

$nombre     =$_POST["nombre"];
$alias      =$_POST["alias"];
$email      =$_POST["email"];
$empresa    =$_POST["empresa"];
$puesto     =$_POST["puesto"];
$avatar     =$_POST["avatar"];
$privacy    =$_POST["privacyCheck1"];
$intentos   = 0;

if($nombre=="" or $alias=="" or  $email=="" or  $empresa=="" or  $puesto=="") {
    $response_array['status'] = 'error';
    $response_array['message'] = 'Debes llenar todos los campos para seguir avanzando';
    echo json_encode($response_array);

}else{
  if(public_email($email)==false) {
    $response_array['status'] = 'error';
    $response_array['message'] = 'Tu dirección de correo debe ser empresarial';
    echo json_encode($response_array);
  }else{
    if ($avatar=="") {
      $response_array['status'] = 'error';
      $response_array['message'] = 'Debes seleccionar una imágen como avatar';
      echo json_encode($response_array);
    }else{
      if ($privacy=="") {
        $response_array['status'] = 'error';
        $response_array['message'] = 'Debes aceptar los términos y condiciones';
        echo json_encode($response_array);
      }else{
        $query1 = "SELECT * FROM `registro` WHERE `reg_alias` = '$alias'";
        $result1 = mysqli_query($link,$query1);
        if ($row1 = mysqli_fetch_array($result1)){ 
          $response_array['status'] = 'error';
          $response_array['message'] = 'El alias/nickname ya está siendo utilizado, elige uno diferente';
          echo json_encode($response_array); 
        }else{
          $query = "SELECT * FROM `registro` WHERE `reg_email` = '$email'";
          $result = mysqli_query($link,$query);
          if ($row = mysqli_fetch_array($result)){ 
              $response_array['status'] = 'error';
              $response_array['message'] = 'Ya se há usado ese correo para registro anteriormente';
              echo json_encode($response_array);  
          }else{
            $idAleatorio=GenerarCodigoGafete(3);  
            /*Codigos QR*/
            
            // $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'../admin_panel/phpqrcode/temp'.DIRECTORY_SEPARATOR;
            // $PNG_WEB_DIR = '../admin_panel/phpqrcode/temp/';
            // $filename = $PNG_TEMP_DIR.'qrcode-'.$idAleatorio.'.png';
            // $errorCorrectionLevel = 'M'; // L M Q H
            // $matrixPointSize = 5;
            // QRcode::png($idAleatorio, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
            
          
            /*Codigos QR*/

            //inserta en la tabla de contacto
              $Upquery = "INSERT INTO registro
              (reg_origen
              ,reg_nombre
              ,reg_alias
              ,reg_email
              ,reg_empresa
              ,reg_puesto
              ,reg_avatar
              ,qrcode
              ,reg_fecha_alta) 
            VALUES
              ('{$reg_origen}'
              ,'{$nombre}'
              ,'{$alias}'
              ,'{$email}'
              ,'{$empresa}'
              ,'{$puesto}'
              ,'{$avatar}'
              ,'{$idAleatorio}'
              ,'{$today}')"; 
                $queryresult = mysqli_query($link,$Upquery);

              if( $queryresult==1)
            {

              //include ("config_mail.php");
                //Enviar correo con contraseña
                //enviar_correo($fromname, $fromaddress, $toname, $toaddress, $bcc ,$subject, $message)
              //enviar_correo($admin_nombre,$admin_email,"$nombre",$email,'',$espanol_asunto,$espanol_mensaje);

              //--ENVIAR CORREOS POR SMTP

              //$mail->ClearAllRecipients( );

              //$mail->AddAddress($email);
              //$mail->AddCC("amazzeo@developmentfactor.com.mx");
              //$mail->AddCC("contacto@servoescolarweb.com");

              //$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
              //$mail->Subject = 'Te registraste de manera exitosa';
              /*
              $msg = "
              <strong>Bienvenido Code Pilot: ".$nombre."</strong>
              <br><br>
              Gracias por enlistarte para pertenecer a nuestro heroico Code Pilot Squad. <br>
              Ahora, ¡no pierdas tiempo!, tu nave te espera para darle batalla a los Cyber Invadres.
              <br><br> 
              Recuerda: <br>
              <strong>¡Vencer al Malware te hará ganar!</strong> <br>
              <a href='https://cyberdefensegame.com/login.php' target='_blank' style='color:#fa582d; font-weight:bold;'>PLAY NOW!</a><br><br>
              <img src='https://cyberdefensegame.com/assets/img/palo-alto-logo-color.png' width='135' alt='Palo Alto'>
              </p>
              ";

              $mail->Body    = $msg;
              $mail->Send();
              */
              //--ENVIAR CORREOS POR SMTP

            $user_log = $email;
            $alias_log = $alias;
            $avatar_log = $avatar;
            $intentos_log = $intentos;
            $id_acceso_log = $idAleatorio;
          //Cargar cookies
            setcookie("USER",$user_log, time()+3600, '/', NULL, 0 );
            setcookie("ALIAS",$alias_log, time()+3600, '/', NULL, 0 );
            setcookie("AVATAR",$avatar_log, time()+3600, '/', NULL, 0 );
            setcookie("INTENTOS",$intentos_log, time()+3600, '/', NULL, 0 );
            setcookie("IDUSER",$id_acceso_log, time()+3600, '/', NULL, 0 );
            $_SESSION['login_usr'] = 1;
              
              $response_array['status'] = 'success';
              $response_array['message'] = 'Tus datos se han mandado correctamente, Gracias por registrarte';
              echo json_encode($response_array);
            }else{
              $response_array['status'] = 'error';
              $response_array['message'] = 'Hubo un error al enviar, intentalo de nuevo mas tarde';
              echo json_encode($response_array);
            }
          }
        }
      }
    }
  }
}


?>
