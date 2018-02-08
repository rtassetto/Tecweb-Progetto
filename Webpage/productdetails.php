<?php
session_start();

require "php-script/connessione.php";
$DB=new DBAccess();
$DB->openc();
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
</head>
<body>
<?php
	include "general/Header.php";
	$product=$DB->getProddata($_GET['id']);
	echo "<h1>".$product['nome']."</h1>
		<img src='images/".$_GET['id'].".jpg'/>
		<span>Categoria di prodotto:".$product['categoria']."</span>
		<span>".$product['valutazione']."/5</span>
		<span>".$product['prezzo']."€</span>
		<p>".$product['descrizione']."</p>";
	//$product[]
	echo "<form method='post' action='prodotti.php'>
          <input type='submit' name=".$_GET['id']." value='Aggiungi al carrello'/>
		  </form>";
	$reviews=$DB->getProdReview($_GET['id']);
	echo "<h2>Recensioni</h2>";
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