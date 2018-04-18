<!DOCTYPE html>
<?php
	session_start();
    require "php-script/connessione.php";
	$DB= new DBAccess();
	$DB->openc();
?>



<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>
<title>Home - Buy Tech</title>    
<?php
	require "general/Meta.php";
?>
    
</head>
    
<body>
    

<?php
	require "general/Header.php";
?>
    
    
    
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p class="trovi"> Ti trovi in: Home </p> 
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
    
   

    <div class="content">
    <section id="LatestBundles">
        <h1>Gli ultimi Bundle che abbiamo creato</h1>
		<?php
		$LB=$DB->getLatestBundles();
        foreach ($LB as $result){
			
			echo "<div class='bundle'>
				<div class='nomebundle'><a href='bundledetails.php?bundle=".$result["nome"]."'>".$result["nome"]."</a></div>
				<div class='descrizionebundle'>".$result["descrizione"]."</div>
				</div>";
			}
		?>  
    </section>
        
    <section id="Bestsellers">
    <h1>I prodotti piu' venduti</h1>
    <?php
    $bestsellers=$DB->getBestselling();
    foreach ($bestsellers as $result){

        echo "<div class='prodottobestseller'>";
        echo "<div class='nomebestseller'><a href='productdetails.php?id=".$result["id"]."'>".$result["nome"]."</a></div>";
        echo "<div class='imgbestseller'><img  src='images/".$result["id"].".jpg' alt='immagine del prodotto'/></div>";        
        echo "<div class='categoriabestseller'>Categoria: ".$result["categoria"]."</div>";
        echo "<div class='votobestseller'>Valutazione: ".$result["valutazione"]."/5</div>";
        echo "<div class='prezzobestseller'>Prezzo: ".$result["prezzo"]."€</div>";
        echo "</div>";
        }
    ?>  
    
    </section>
  </div> 

 <?php
	require "general/Footer.php";
 ?>   
</body>

</html>