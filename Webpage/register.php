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
       $errmail=checkMail($email);
       $result=0;
       if(!$errUser && !$errPass && !$errmail){
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
    <form name="registration" class="login-form" action="register.php" method="POST">
        <div class="user">
        <label for="username">Username:</label>
        <input type="text" id='username' class="nome_utente" name="username" maxlength="20" onblur="checkUser()"/>
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
    <div id="errori">
    <?php
        if (isset($_POST["submit"])){
            if($errUser){
                echo "<h5 id='usernameerr' class='red'>l'username può contenere solo lettere e numeri deve essere lungo tra i 6 e i 20 caratteri</h5>";
            }    
            else{
                echo "<h5 id='usernameerr' class='red'></h5>";
            }
        }
        if (isset($_POST["submit"])){
            if($errPass){
                echo "<h5 id='passerr' class='red'>la password deve essere lunga tra i 6 e i 20 caratteri e non può contenere spazi</h5>";
            }   
            else{
                echo "<h5 id='passerr' class='red'></h5>";
            }
        }
        if (isset($_POST["submit"])){
            if($errmail){
                echo "<h5 id='emailerr' class='red'>inserisci una email corretta</h5>";
            }    
            else{
                echo "<h5 id='emailerr' class='red'></h5>";
            }
        }
   ?>
	</div>
<?php
	require "general/Footer.php";
?> 
</body>
</html>