<?php
require  "php-script/connessione.php";

session_start();
if(isset($_SESSION['login_user'])){
	header("location: home.php");
}
if(isset($_POST["submit"])){
	$username=$_POST["nome_utente"];
	$password=$_POST["pass"];
	$DB=new DBAccess();
	$DB->openc();
	$result=$DB->checkUser($username,$password);

	if ($result=="user"){
		$_SESSION['login_user']=$username;
        $_SESSION['admin']=false;
		header("location: home.php");
	}

	else if($result=="admin"){
		$_SESSION['login_user']=$username;
		$_SESSION['admin']=true;
		header("location: adminmenu.php");
	}
}


?>
<!DOCTYPE html>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>    
<?php
	require "general/Meta.php";
?>

    <title>Home</title>
</head>

<?php
	include "general/Header.php";
?>
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Login </p> 
    </div>
    
    
   <div class="form">
    <form class="login-form" method="post" action="login.php">
      <input type="text" name="nome_utente" placeholder="username"/>
      <input type="password" name="pass" placeholder="password"/>
      <input type="submit" name="submit" value="Login"/>
      <p class="message">Non sei registrato? <a href="#">Crea un account</a></p>
    </form>
  </div>
  
    
<?php
	include "general/Footer.php";
?>