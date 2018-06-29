<!DOCTYPE html>
<?php 
session_start();
require "php-script/connessione.php";
$DB=new DBAccess();
$DB->openc();
if(!isset($_SESSION['login_user'])){
	header("location: home.php");
}
?>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<html lang="it">
<head>  
    <title>Account - Buy Tech</title>  
<?php
	require "general/Meta.php";
    echo "</head>
         <body>";
    require "general/Header.php";
?>
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Account </p> 
    </div>

<?php

echo "<h1>Gestione account</h1>";
echo "<p>Benvenuto, ".$_SESSION['login_user']." !</p>";
$Dati=$DB->getUser($_SESSION['login_user']);
echo "<p>Email utente: ".$Dati['email']."</p>
	  <p>Creato il: ".$Dati['datacreazione']."</p>";
echo "<div id='options'><a href='purchasehistory.php'>Storia degli Acquisti</a>
	  <a href='carrello.php'>Carrello</a>
	  <a href='logout.php'>Logout</a></div>";

?>


<?php
require "general/Footer.php";
?>
</body>

</html>