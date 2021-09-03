<?php
  session_start();
  if(!isset($_SESSION['login_usr'])){
    ?>
      <script type="text/javascript">
          window.location.href = "../login.php"
      </script>
    <?php 
  }
  $seccion = 'playgame';
  $page_title = 'Palo Alto | Cyber Invaders - juega';
  include('../config.php');
  include('../function.php');


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

  <section id="juego" class="juego">
  <div id="unity-fullscreen-button" style="display: none;"></div>

  <div id="unity-container" class="unity-desktop">
    <canvas id="unity-canvas" style="padding: 0px; position: absolute; height:100%; width:100%;"></canvas>
  </div>
  <div id="loading-cover" style="display:none;">
    <div id="unity-loading-bar">
      <div id="unity-logo"><img src="yourlogo.png"></div>
      <div id="unity-progress-bar-empty" style="display: none;">
        <div id="unity-progress-bar-full"></div>
      </div>
      <div class="spinner"></div>
    </div>
  </div>

  </section>
  <section id="controls-bar" class="no-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="accordion">
            <div class="card" style="border: none">
              <div class="card-header" id="headingZero">
                <h5 class="mb-0">
                  <!--
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                    <i class="fa fa-angle-down"></i> ¿Cómo se juega?
                  </button>
                  -->
                  <a href="#" class="close-btn" id="hide-controls" onclick="return false;">
                    <i class="fa fa-times-circle-o" aria-hidden="true"></i> Cerrar
                  </a>
                </h5>
              </div>

              <div id="collapseZero" class="collapse show" aria-labelledby="headingZero" data-parent="#accordion">
                <div class="card-body">
                  <div id="controles-img" class="row controles-img">
                    <div class="text-center" style="width: 100%">
                      <img src="../assets/img/controles.png" class="img-fluid" alt="Controles">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script type="text/javascript">
    $("#hide-controls").click(function(){
      $("#controls-bar").fadeOut();
    });
    $("#show-controls").click(function(){
      $("#controls-bar").fadeIn();
    });
  </script>
  
</body>

<!-- Tu configuración -->
<script>
  const gameURL = 'https://www.experienciasvirtuales.tv/paloalto/spacegame/';
  const openInformation = () => window.open("https://www.paloaltonetworks.com.mx/", "_blank");
  const gameover = () => window.open(gameURL + "game/gameover.php", "_self");
</script>


<!-- Compartir en Facebook -->
<script>
  window.fbAsyncInit = function () {
    FB.init({
      appId: '670721590279787',
      autoLogAppEvents: true,
      xfbml: true,
      version: 'v9.0'
    });
  };

  function compartirEnFacebook(puesto, puntos) {
    FB.ui({
      method: 'share',
      href: gameURL,
      quote: `¡Voy en ${puesto}º puesto con ${puntos} puntos!`,
    }, function (response) { });
  }
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

<!-- Unity Loader -->
<script>
  const hideFullScreenButton = "";
  const buildUrl = "Build";
  const loaderUrl = buildUrl + "/d0f6214b50dd0d7dde5a6d3859bb7e02.js";
  const config = {
    dataUrl: buildUrl + "/c26d9eb14a0f69a781ff611397c56c2f.data.unityweb",
    frameworkUrl: buildUrl + "/bb76fe9e09ab429f9163aba18f046bce.js.unityweb",
    codeUrl: buildUrl + "/e3893dca71b2053dde37e919b661e571.wasm.unityweb",
        streamingAssetsUrl: "StreamingAssets",
    companyName: "DefaultCompany",
    productName: "FreeGalaga",
    productVersion: "1.0",
  };

  const container = document.querySelector("#unity-container");
  const canvas = document.querySelector("#unity-canvas");
  const loadingCover = document.querySelector("#loading-cover");
  const progressBarEmpty = document.querySelector("#unity-progress-bar-empty");
  const progressBarFull = document.querySelector("#unity-progress-bar-full");
  const fullscreenButton = document.querySelector("#unity-fullscreen-button");
  const spinner = document.querySelector('.spinner');

  const canFullscreen = (function () {
    for (const key of [
      'exitFullscreen',
      'webkitExitFullscreen',
      'webkitCancelFullScreen',
      'mozCancelFullScreen',
      'msExitFullscreen',
    ]) {
      if (key in document) {
        return true;
      }
    }
    return false;
  }());

  if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
    container.className = "unity-mobile";
    config.devicePixelRatio = 1;
  }
  loadingCover.style.display = "";

  const script = document.createElement("script");
  script.src = loaderUrl;
  let unityInstance;
  script.onload = () => {
    createUnityInstance(canvas, config, (progress) => {
      spinner.style.display = "none";
      progressBarEmpty.style.display = "";
      progressBarFull.style.width = `${100 * progress}%`;
    }).then((uInstance) => {
      unityInstance = uInstance;
      loadingCover.style.display = "none";
      if (canFullscreen) {
        if (!hideFullScreenButton) {
          fullscreenButton.style.display = "";
        }
        fullscreenButton.onclick = () => {
          uInstance.SetFullscreen(1);
        };
      }
    }).catch((message) => {
      alert(message);
    });
  };
  document.body.appendChild(script);
</script>

</html>
