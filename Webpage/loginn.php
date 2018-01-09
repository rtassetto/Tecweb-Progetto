<!DOCTYPE HTML>
<HTML>
<head>
<?php
    require  "php-script/connessione.php";
    require  "php-script/utente.php";
	if(isset($_POST["submit"])){
		$username=$_POST["username"];
		$password=["password"];
		$email=["email"];
		$conn = new BDAccess();
		$conn->openc();
		createUser($username,$password,$email);
	}
?>
</head>
<body>
    <form class="login-form" method="post" action="loginn.php">
      <input type="text" name="nome_utente" placeholder="username"/>
      <input type="password" name="pass" placeholder="password"/>
	  <input type="email" name="email" placeholder="email"/>
	  <input type="submit" value="Submit">
    </form>
</body>
<HTML>