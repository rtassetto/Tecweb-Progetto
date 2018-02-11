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
	echo "
        <div id='dettaglioProdotto'>
        <h1 class='nome'>".$product['nome']."</h1>
		<div class='img'><img src='images/".$_GET['id'].".jpg'/></div>
		<div class='categoria'><p>Categoria di prodotto:".$product['categoria']."</p></div>
		<div class='valutazione'><p>Valutazione : ".$product['valutazione']."/5</p></div>
		<div class='prezzo'><p>Prezzo : ".$product['prezzo']."€</p></div>
		<div class='descrizione'><p>".$product['descrizione']."</p></div>";
	//$product[]
    if(isset($_SESSION['login_user'])){
        echo "<form class='popup' method='post' action='prodotti.php'>
              <div class='aggiungiCarrello'>
              <input type='submit' onclick='myFunction()' name=".$_GET['id']." value='Aggiungi al carrello'/>
              </div>
              <span class='popuptext' id='myPopup'>Prodotto aggiunto al carrello</span>
              </form></div>";
    }else{
        
        echo "</div><p>Effettua il <a href='login.php'>login</a> o <a href='register.php'>registrati</a> per acquistare questo prodotto.</p>";  
    }
    echo "<div id='recensioni'><h2>Recensioni</h2>";
    $reviews=$DB->getProdReview($_GET['id']);
	if(!$reviews){
        echo "<span>Non ci sono recensioni per questo prodotto</span></div>";
    }else{
        foreach($reviews as $result){
            echo "<div class='dettRecensione'>
                  <span>Autore: ".$result['username']."</span>
                  <span>Data: ".$result['data']."</span>
                  <span>Valutazione: ".$result['voto']."</span>
                  <p>".$result['review']."</p>
                  </div>";
        }
	}
    echo"</div>";
	
    include "general/Footer.php";
?>
</body>
</html>