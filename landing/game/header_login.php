<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $page_title; ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <!--<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="./TemplateData/style.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex">

      <!--<h1 class="logo mr-auto"><a href="index.html">Arsha</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
      <!--
      <a href="playgame.php" class="logo mr-auto"><img src="../assets/img/palo-alto-logo.png" alt="" class="img-fluid"></a>
      -->
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="drop-down">
            <a href="#">
                <span class="profile-ava">
                    <img alt="" src="../assets/img/avatars/<?php echo $_COOKIE['AVATAR']; ?>">
                </span>
                <span class="username"><?php echo $_COOKIE['ALIAS']; ?></span>
            </a>
            <ul>
              <li class="info">Score: <?php echo $puntos; ?> puntos</li>
              <li><a href="#" id="show-controls" onclick="return false;"><i class="fa fa-eye"></i> Mostrar Controles</a></li>
              <li><a href="logout.php?ch=logout"><i class="fa fa-sign-out"></i> Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->