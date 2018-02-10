<?php 
require "php-script/connessione.php";
$DB=new DBAccess();
$DB->openc();
if(isset($_POST["submit"])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$result=$DB->createUser($username, $password, $email);
	if ($result==0){
		header("location: home.php");
	}
}
?>
<!DOCTYPE html>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<html lang="it">
<head> 
	<title>Registra un nuovo account - Buy Tech</title>
	<?php
	require "general/Meta.php";
	?>
	<script>
		function validateForm() {
			var fail=false;
			//Correttezza username
			var username=document.forms["registration"]["username"].value;
			if (username.length<5){
				document.getElementById("usernameerr").innerHTML="Username troppo corto";
				fail=true;
			}
			 else if (username.length>20){
				document.getElementById("usernameerr").innerHTML="Username troppo lungo";
				fail=true;
			}
			else
			{
				document.getElementById("usernameerr").innerHTML="";
			}
			
			//correttezza password
			var password=document.forms["registration"]["password"].value;
			if (password.length<5){
				document.getElementById("passworderr").innerHTML="Password troppo corta";
				fail=true;
			}
			else if (password.length>20){
				document.getElementById("passworderr").innerHTML="Password troppo lunga";
				fail=true;
			}
			else{
				document.getElementById("passworderr").innerHTML="";
			}

			//correttezza email
			var email=document.forms["registration"]["email"].value;
			if (email.length<5){
				document.getElementById("emailerr").innerHTML="Email troppo corto";
				fail=true;
			}
			else if (email.length>50){
				document.getElementById("emailerr").innerHTML="Email troppo lungo";
				fail=true;
			}
			else{
				document.getElementById("emailerr").innerHTML="";
			}
			
		return !fail;
		}
	</script>
</head>
<body>
<?php
	require "general/Header.php";
?>
    
        <div id="breadcrumb"> 
        <p> Ti trovi in: Home </p> 
        </div>
<?php
	switch ($result){
		case 1 : echo "<p>Esiste gia\' un utente con username '".$username."'</p>";
				 break;
		case 2 : echo "<p>Vi e' stato un problema nella registrazione dell'utente. Riprovare piu' tardi</p>";
				 break;
		case 3 : echo "<p>I dati sono scorretti. Assicurarsi che i dati siano nei limiti consentiti</p>";
				 break;
		case 4 : echo "<p>L'indirizzo mail ".$email." e' gia' associato ad un utente</p>";
				 break;
	}
?>

	<div id="istruzioni">
		<ul>
			<li>username deve essere tra  6 e 20 caratteri</li>
			<li>password deve essere tra i 6 e 20 caratteri</li>
			<li>email deve essere un valido indirizzo e-mail e non superare i 50 caratteri</li>
		</ul>
	</div>
   <div class="form"> 
    <form name="registration" class="login-form" action="register.php" method="POST" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" name="username" maxlength="20"/>
		<span id="usernameerr"></span>

        <label for="password">Password:</label>
        <input type="password" name="password" maxlength="20"/>
		<span id="passworderr"></span>


        <label for="email">E-mail:</label>
        <input type="email" name="email" maxlength="50"/>
		<span id="emailerr"></span>

        <input type="submit" class="form_submit" name="submit" value="Registra"/>
    </form>
    </div>
<?php
	require "general/Footer.php";
?> 
</body>