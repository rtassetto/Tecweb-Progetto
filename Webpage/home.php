<?php
	session_start();
    require "php-script/connessione.php";
	$DB= new DBAccess();
	$DB->openc();
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
    
<body>
    

<?php
	require "general/Header.php";
?>
    
    
    
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home </p> 
    </div>
    <!--
    <form id="login" action="login.php" method="post">

      <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <input type="checkbox" checked="checked"> Ricordami in seguito
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form> -->
    
   

    
    <section id="content1">
        <h1>I prodotti piu' venduti</h1>
		<?php
		$bestsellers=$DB->getBestselling();
		foreach ($bestsellers as $result){
			
			echo "<div><span>".$result["nome"]."</span>
				<span>".$result["categoria"]."</span>
				<span>".$result["valutazione"]."</span>
				<span>".$result["prezzo"]."</span></div>";
			}
		?>  
    
    </section>
    

    
    <section id="LatestBundles">
        <h1>Gli ultimi Bundle che abbiamo creato</h1>
		<table>
		<?php
		$DB->getLatestBundles();
		?>  
		</table>
    </section>
    
    
    
 <?php
	require "general/Footer.php";
 ?>   
</body>

</html>