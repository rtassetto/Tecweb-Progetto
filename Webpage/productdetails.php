<?php
session_start();

require "php-script/connessione.php";
$DB=new DBAccess();
$conn=$DB->openc();
?>
<!DOCTYPE HTML>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>
<?php
	include "general/Meta.php";
?>

        
    
    <script>
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
</head>
<body>
<?php
	include "general/Header.php";
    $product=$DB->getProddata($_GET['id']);
    echo "<div id='breadcrumb'><p> Ti trovi in: Home &#8594; Prodotti &#8594; ".$product['nome']."</p></div>";
	echo "<h1>".$product['nome']."</h1>
		<img src='images/".$_GET['id'].".jpg'/>
		<span>Categoria di prodotto:".$product['categoria']."</span>
		<span>".$product['valutazione']."/5</span>
		<span>".$product['prezzo']."€</span>
		<p>".$product['descrizione']."</p>";
	//$product[]
    if(isset($_SESSION['login_user'])){
        echo "<form class='popup' method='post' action='prodotti.php'>
              <input type='submit' onclick='myFunction()' name=".$_GET['id']." value='Aggiungi al carrello'/>
              <span class='popuptext' id='myPopup'>Prodotto aggiunto al carrello</span>
              </form>";
    }else{
        echo "<p>Effettua il <a href='login.php'>login</a> o <a href='register.php'>registrati</a> per acquistare questo prodotto.";  
    }
    echo "<h2>Recensioni</h2>";
    $reviews=$DB->getProdReview($_GET['id']);
	if(!$reviews){echo "<span>Non ci sono recensioni per questo prodotto</span>";}
	else{
	foreach($reviews as $result){
		echo "<div class='recensione'>
			  <span>".$result['username']."</span>
			  <span>".$result['data']."</span>
			  <span>".$result['voto']."</span>
			  <p>".$result['review']."</p>
			  </div>";
	}
	}
	?>
<?php
	include "general/Footer.php";
?>
</body>
</html>