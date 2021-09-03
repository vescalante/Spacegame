<?php
  session_start();
  if(!isset($_SESSION['login_usr'])){
    ?>
      <script type="text/javascript">
          window.location.href = "login.php"
      </script>
    <?php 
  }
  $seccion = 'playgame';
  $page_title = 'Palo Alto | Cyber Invaders - juega';
  include('config.php');
  include('function.php');


  $user = $_COOKIE['IDUSER'];
  $query2 = "SELECT * FROM `registro` WHERE `qrcode` = '$user'";
  $result = mysqli_query($link,$query2);

  if ($row = mysqli_fetch_array($result)){ 
    $puntos = $row['reg_score'];
    $intentos = $row['reg_intentos'];
    $nombre = $row['reg_nombre'];
    $alias = $row['reg_alias'];
    $email = $row['reg_email'];
  }
  include("header_login.php"); 
?>

  <main id="main">
    <!-- ======= Game Section ======= -->
      <section id="juego" class="juego section-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center p-0">
              <div style="background: rgba(0,0,0,0.8); height: 100vh; width: 100%; text-align: center;">
                Aquí debe ir el juego
              </div>
            </div>
          </div>
        </div>
      </section>

  </main>

<?php include("footer.php"); ?>
