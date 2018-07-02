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
<title>Bundle <?php echo $_GET['bundle'];?> - Buy Tech</title>
<?php
	include "general/Meta.php";
?>

</head>
<body>
<?php
	include "general/Header.php";
    $product=$DB->getBundle($_GET['bundle']);
    echo "<div id='breadcrumb'><p> Ti trovi in: Home &#8594; Bundle '".$product['nome']."'</p></div>";
	echo "
        <div id='dettaglioBundle'>
        <h1 class='nome'>".$product['nome']."</h1>
		<div class='data'><p>Creato il:".$product['data']."</p></div>
		<div class='descrizione'><p>".$product['descrizione']."</p></div>";
	$query=$DB->getBundlepartsdata($_GET['bundle']);
	if($query!="vuoto"){
	foreach($query as $x){
                $id=$x['id'];
                echo "<div class='prodotto'>";
                echo "<div class='nome'>";
                echo "<a href='productdetails.php?id=".$x["id"]."'>".$x["nome"]."</a>";  
                echo "</div>";
                echo "<div class='info'>";
                echo "<div class='categoria'>";
                echo "Categoria: ".$x["categoria"];
                echo "</div>";
                echo "<div class='valutazione'>";
                echo "Valutazione: ".$x["valutazione"]."/5";
                echo "</div>";
                echo "<div class='prezzo'>";
                echo "Prezzo: ".$x["prezzo"]."€";
                echo "</div>";
                echo "</div>";
                echo "<div class='imgc'><img src='images/$id.jpg' alt='immagine prodotto'/>";
                echo "</div>";
                echo "<div class='dettaglio'><p><a href='productdetails.php?id=".$x["id"]."'>Vai al dettaglio</a></p>";
                echo "</div>";
                echo "</div>";
            }
	//$product[]
    if(isset($_SESSION['login_user'])){
        echo "<form class='popup' method='post' action='prodotti.php?bundle=".$_GET['bundle']."'>
              <div class='aggiungiCarrello'>
              <input type='submit' name='compraBundle' value='Aggiungi al carrello'/>
              </div>
              </form></div>";
    }else{
        
        echo "</div><p>Effettua il <a href='login.php'>login</a> o <a href='register.php'>registrati</a> per acquistare questo prodotto.</p>";  
    }
	}
	else {echo "Il bundle e' vuoto.";}
	?>
<?php
	include "general/Footer.php";
?>
</body>
</html>