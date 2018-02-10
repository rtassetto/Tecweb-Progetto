<!DOCTYPE html>
<?php session_start();
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
?>
</head>
    
<body>
<?php
require "general/header.php";
echo "<h1>Gestione account</h1>";
echo "<p>Username:".$_SESSION['login_user']."</p>";

echo "<a href='purchasehistory.php'>Storia degli Acquisti</a>
	  <a href='carrello.php'>Carrello</a>
	  <a href='logout.php'>Logout</a>";

?>


<?php
require "general/footer.php";
?>
</body>

</html>