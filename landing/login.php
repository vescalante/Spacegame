<?php
  session_start();
  if(isset($_SESSION['login_usr'])){
    ?>
      <script type="text/javascript">
        window.location.href = "game/index.php"
      </script>
    <?php 
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Palo Alto | Cyber Invaders</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <!--<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/login-style.css" rel="stylesheet">
</head>
<body>
  <div class="wrapper fadeIn">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="top-icon fadeIn first">
        <img src="assets/img/palo-alto-logo-color.png" id="icon" alt="Palo Alto" />
      </div>


      <!-- Login Form -->
      <form id="inForm">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="Ingresa tu Email" required="required">
        <!--<input type="text" id="password" class="fadeIn third" name="login" placeholder="Contraseña">-->
        <input type="submit" class="fadeIn fourth" value="A JUGAR">
      </form>

      <!-- Text -->
      <div class="top-text">
        <p>Ingresa el correo electrónico con el que te registraste <br>
           <a class="underlineHover" href="index.html#registro">Si aún no te registras, hazlo ahora.</a>
        </p>
      </div>

      <!-- Messages -->
      <div class="error-message"></div>
      <div class="sent-message">Gracias, Bienvenido</div>

      <!-- Remind Passowrd -->
      <!--
      <div id="formFooter">
        <a class="underlineHover" href="#">Olvide mi password</a>
      </div>
      -->
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>

  <!-- GUARDAR DATOS DE LA SECCION PERFIL -->
  <script>
        $(function () {
          $('#inForm').submit(function (event) {

         event.preventDefault();// using this page stop being refreshing 

            $.ajax({
                type: 'POST',
                url: 'login_validate.php',
                data: $('form').serialize(),
                dataType: "json",
                success: function(data) {

                    if(data.status == "success"){
                      $('.error-message').slideUp();
                      $('.sent-message').slideDown().html(data.message);
                      setTimeout(function(){window.location.href = "game/";} , 2000); 
                    }
                    else if(data.status == "error"){
                      $('.sent-message').slideUp();
                      $('.error-message').slideDown().html(data.message);
                    }

                 }
            });
          });
        });
  </script>
  <!-- GUARDAR DATOS DE LA SECCION PERFIL -->

</body>
</html>