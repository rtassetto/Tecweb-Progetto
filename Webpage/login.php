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
<title>Login - Buy Tech</title>  
<?php
	require "general/Meta.php";
?>
</head>

<?php
	include "general/Header.php";
?>
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Login </p> 
    </div>
    
    
   <div class="form">
    <form class="login-form" method="post" action="login.php">
      <div class="user">
          <label for="nome_utente">Username:</label>
          <input type="text" id='nome_utente' class="nome_utente" name="nome_utente" placeholder="username" required/>
      </div>
      <div class="psw">
        <label for="pass">Password:</label>
        <input type="password" id='pass' class="pass" name="pass" placeholder="password" required/>
        </div>
      <input type="submit" class="submit" id="submit_form" name="submit" value="Login"/>
      <p class="message">Non sei registrato? <a href="register.php">Crea un account</a></p>
    </form>
  </div>
  
    
<?php
	include "general/Footer.php";
?>
</html>