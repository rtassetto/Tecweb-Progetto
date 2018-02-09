<?php 
require "php-script/connessione.php";
$DB=new DBAccess();
$DB->openc();
if(isset($_POST["submit"])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$DB->createUser($username, $password, $email);
	header("location: /home.php");
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
</head>
<body>
<?php
	require "general/Header.php";
?>
<form action="register.php" method="POST">
<label for="username">Username:</label>
<input type="text" name="username"/>

<label for="password">Password:</label>
<input type="password" name="password"/>

<label for="email">E-mail</label>
<input type="email" name="email"/>
<input type="submit" name="submit" value="Registra"/>
</form>
<?php
	require "general/Footer.php";
?> 
</body>