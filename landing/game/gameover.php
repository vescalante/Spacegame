<?php
session_start();
//logout script

unset($_SESSION['login_usr']);
if (isset($_SERVER['HTTP_COOKIE']))
{
	$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	foreach($cookies as $cookie)
	{
	    $mainCookies = explode('=', $cookie);
    	$name = trim($mainCookies[0]);
    	setcookie($name, '', time()-1000);
    	setcookie($name, '', time()-1000, '/');
	}
}
header('Location:../thanks.html');


if(!isset($_SESSION['login_admin_adm'])){
				?>
				<script type="text/javascript">
            		window.location.href = "../thanks.html"
        		</script>
                <?php 
     }
?>