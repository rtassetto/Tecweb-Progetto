<?php
session_start();

require "php-script/connessione.php";
$DB=new DBAccess();
$conn=$DB->openc();
$product=$DB->getProddata($_GET['id']);
?>
<!DOCTYPE HTML>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>
<title>Dettagli <?php echo $product['nome'];?> - Buy Tech</title>
<?php
	include "general/Meta.php";
?>

     <script type="text/javascript">
            function aggcarrello(){
                window.alert("Prodotto aggiunto correttamente al carrello!");
            }
        </script>   
    
    
</head>
<body>
<?php
	include "general/Header.php";
    echo "<div id='breadcrumb'><p> Ti trovi in: Home &#8594; Prodotti &#8594; ".$product['nome']."</p></div>";
	echo "
        <div id='dettaglioProdotto'>
        <h1 class='nome'>".$product['nome']."</h1>
        <div class='info'>
		<div class='categoria'><p>Categoria di prodotto:".$product['categoria']."</p></div>
        <div class='descrizione'><p>".$product['descrizione']."</p></div>
		<div class='valutazione'><p>Valutazione : ".$product['valutazione']."/5</p></div>
		<div class='prezzo'><p>Prezzo : ".$product['prezzo']."€</p></div>
        </div>
        <div class='img'><img src='images/".$_GET['id'].".jpg' alt='immagine del prodotto'></div>";
	//$product[]
    if(isset($_SESSION['login_user'])){
        echo "<form class='popup' method='post' action='prodotti.php'>
              <div id='aggiungiCarrello'>
              <input type='submit' onclick='aggcarrello()' name=".$_GET['id']." value='Aggiungi al carrello'/>
              </div>
              </form></div>";
    }else{
        
        echo "<div><p>Effettua il <a href='login.php'>login</a> o <a href='register.php'>registrati</a> per acquistare questo prodotto.</p>";  
    }
    echo "<div id='recensioni'><h2>Recensioni</h2>";
    $reviews=$DB->getProdReview($_GET['id']);
	if(!$reviews){
        echo "<span>Non ci sono recensioni per questo prodotto</span>";
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