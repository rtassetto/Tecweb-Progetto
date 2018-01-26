<?php
require  "php-script/connessione.php";
require  "php-script/utente.php";

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
	if ($result="user"){
		$_SESSION['login_user']=$username;
		header("location: home.php");
	}
	else if($result="admin"){
		$_SESSION['login_user']=$username;
		$_SESSION['admin']=true;
		//header("location: admin.php");
	}
}

?>
<!DOCTYPE html>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>    
    <meta charset="utf-8">
    <meta name="description" content="Sito web dedicato all'acquisto e pubblicazione di e-book."/>
    <meta name="keywords" content="ebook, ebook gratis, vendita ebook, e-book"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lotto Matteo, Tassetto Riccardo, Zago Davide"/>
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="stylesheet" href="style/print.css" media="print"/>
    <!--<link rel="stylesheet" href="style/small.css" media="handheld, screen and (max-width:480px), only screen and (max-device-width:480px)"/>--> 

    <title>Home</title>
</head>

    <header>
        <img id="logo" src="images/Capcom_logo.png" alt="Logo sito"/>        
        <nav>
            <ul>
                <li><a class="current" href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="chi_siamo.html">Chi siamo</a></li>
                <li><a href="prodotti.php">Prodotti</a></li>
                <li><form action="php-script/cerca.php" method="post">
                    <button id="searchButton" type="submit">Go</button>
                    <input id="search" type="text" name="testo" placeholder="Cerca..."></form> 
                </li>
            </ul>
        </nav>
    </header>
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home </p> 
    </div>
    
    
   <div class="form">
    <?php
	echo $_SESSION["login_user"];
	?>
    <form class="login-form" method="post" action="login.php">
      <input type="text" name="nome_utente" placeholder="username"/>
      <input type="password" name="pass" placeholder="password"/>
      <input type="submit" name="submit" value="Login"/>
      <p class="message">Non sei registrato? <a href="#">Crea un account</a></p>
    </form>
  </div>
  
    
    <footer>
        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS Valido!" />
            </a>
        </p>
        
        <p> Developed by Lotto Matteo, Tassetto Riccardo, Davide Zago</p>

    </footer>