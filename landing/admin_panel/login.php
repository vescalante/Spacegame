<?php
	session_start();
	if(isset($_SESSION['login_admin'])){
				?>
				<script type="text/javascript">
            		window.location.href = "login.php"
        		</script>
                <?php 
     }
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>SYNNER Corporation | Admin Panel</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="../favicon.ico" />
    	<script src="../lib/jquery/jquery.min.js"></script>
        <script src="js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
	    <link rel="stylesheet" href="css/jquery.modal.css" type="text/css" media="screen" />
        
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
                 	  $("#acceso").modal("show");
					  $("#mensaje_exito").empty();
					  $("#mensaje_exito").append(data.message);
                  }
                  else if(data.status == "error"){
					  $("#error").modal("show");
					  $("#mensaje_error").empty();
					  $("#mensaje_error").append(data.message);
                  }

               }
        	});
        });
      });

</script>
<!-- GUARDAR DATOS DE LA SECCION PERFIL -->  
  </head>

  
  <!-- AVISOS -->
<div class="modal fade" id="acceso" style="display:none">
		<h4 class="modal-title">Tus datos fueron validados!!</h4>
		<p style="margin-top:-15px" id="mensaje_exito">

        </p>
		<button type="button" class="btn blue" onClick="location.href = 'index.php';">Acceder al panel</button>
</div>

<div class="modal fade" id="error" style="display:none">
			<h4 class="modal-title">Hubo un error</h4>
            <p style="margin-top:-15px" id="mensaje_error">
			
            </p>
</div>
<!-- TERMINA AVISOS -->
  
  <body>
    <div class="login-page">
  <div class="header_title">
  	<img src="images/head_title.png" width="360">
  </div>  
  <div class="form">
    <form class="login-form" id="inForm">
      <input type="text" placeholder="username" name="username" required/>
      <input type="password" placeholder="password" name="password" required/>
      <button type="submit">Entar</button>
    </form>
  </div>
</div>
    

        
	<script src="js/index.js"></script>
    
    
    
  </body>
</html>
