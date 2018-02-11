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
<title>Bundle <?php echo $product['nome'];?> - Buy Tech</title>
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
    $product=$DB->getBundle($_GET['bundle']);
    echo "<div id='breadcrumb'><p> Ti trovi in: Home &#8594; Bundles &#8594; ".$product['nome']."</p></div>";
	echo "
        <div id='dettaglioBundle'>
        <h1 class='nome'>".$product['nome']."</h1>
		<div class='data'><p>Creato il:".$product['data']."</p></div>
		<div class='descrizione'><p>".$product['descrizione']."</p></div>";
	$query=$DB->getBundlepartsdata($_GET['bundle']);
	echo "<table>
			<thead>
				<th>Nome</th>
				<th>Categoria</th>
				<th>Valutazione</th>
				<th>Prezzo</th>
			</thead>";
	foreach($query as $result){
		echo"<tr>
				<td><a href='productdetails.php?id=".$result['id']."'>".$result['nome']."</a></td>
				<td>".$result['categoria']."</td>
				<td>".$result['valutazione']."</td>
				<td>".$result['prezzo']."</td>
			</tr>";
	}
	echo "</table>";
	//$product[]
    if(isset($_SESSION['login_user'])){
        echo "<form class='popup' method='post' action='prodotti.php?bundle=".$_GET['bundle']."'>
              <div class='aggiungiCarrello'>
              <input type='submit' name='compraBundle' value='Aggiungi al carrello'/>
              </div>
              <span class='popuptext' id='myPopup'>Bundle aggiunto al carrello</span>
              </form></div>";
    }else{
        
        echo "</div><p>Effettua il <a href='login.php'>login</a> o <a href='register.php'>registrati</a> per acquistare questo prodotto.</p>";  
    }
	?>
<?php
	include "general/Footer.php";
?>
</body>
</html>