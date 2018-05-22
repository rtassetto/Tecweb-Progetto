<?php 
require "php-script/connessione.php";
require "php-script/controlli.php";
$DB=new DBAccess();
$DB->openc();
$errUser=false;
$errPass=false;
if(isset($_POST["submit"])){
	   $username=$_POST["username"];
	   $password=$_POST["password"];
	   $email=$_POST["email"];
       $errUser=(checkLength($username) || checkUsername($username));
       $errPass=(checkLength($password) || checkPassword($password));
       $result=0;
       if(!$errUser && !$errPass){
       $result=$DB->createUser($username, $password, $email);
	       if ($result==0){
               header("location: home.php");
	       }
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
</head>
<body>
<?php
	require "general/Header.php";
?>
    
        <div id="breadcrumb"> 
        <p> Ti trovi in: Home </p> 
        </div>
    
    
        <div id="istruzioni">
        <p>Attenzione!</p>
		<ul>
			<li>Il campo &ldquo;Username &rdquo; deve contenere tra i 6 e i 20 caratteri.</li>
			<li>Il campo &ldquo;Password &rdquo; deve contenere tra i 6 e i 20 caratteri.</li>
			<li>Il campo &ldquo;E-mail &rdquo; deve contenere un indirizzo e-mail valido.</li>
		</ul>
	</div>
   <div class="form"> 
    <form name="registration" class="login-form" action="register.php" method="POST" onsubmit="return validateForm()">
        <div class="user">
        <label for="username">Username:</label>
        <input type="text" id='username' class="nome_utente" name="username" maxlength="20"/>
        </div>
        <div class="psw">
        <label for="password">Password:</label>
        <input type="password" id='password' class="pass" name="password" maxlength="20"/>
        </div>

        <div id="mail">
        <label for="email">E-mail:</label>
        <input type="email" id='email' name="email" maxlength="50"/>
        </div>

        <input type="submit" class="form_submit" name="submit" value="Registra"/>
    </form>
    </div>
    <?php
        if (isset($_POST["submit"])){
            if($errUser){
                echo "<h5 class='red'>l'username può contenere solo lettere e numeri deve essere lungo tra i 6 e i 20 caratteri</h5>";
            }    
        }
        if (isset($_POST["submit"])){
            if($errPass){
                echo "<h5 class='red'>la password deve essere lunga tra i 6 e i 20 caratteri e non può contenere spazi</h5>";
            }    
        }
   ?>
<?php
    

 if(isset($_POST["submit"])){
	switch ($result){
		case 1 : echo "<p>Esiste gi&agrave; un utente con username &ldquo;".$username." &rdquo;</p>";
				 break;
		case 2 : echo "<p>C'&egrave; stato un problema nella registrazione dell'utente. Riprovare pi&uacute; tardi</p>";
				 break;
		case 3 : echo "<p>I dati non sono corretti. Assicurarsi che i dati siano nei limiti consentiti.</p>";
				 break;
		case 4 : echo "<p>L'indirizzo e-mail &ldquo;".$email." &rdquo; &egrave; gi&agrave; associato ad un utente.</p>";
				 break;
	}
 }
?>


    <div id="errori">
		<ul>
			<li id="usernameerr"></li>
			<li id="passworderr"></li>
			<li id="emailerr"></li>
		</ul>
	</div>
<?php
	require "general/Footer.php";
?> 
</body>
</html>