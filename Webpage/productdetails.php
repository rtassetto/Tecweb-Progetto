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
		<span>Categoria di prodotto:".$product['categoria']."</span>
		<span>".$product['valutazione']."/5</span>
		<span>".$product['prezzo']."€</span>
		<p>".$product['descrizione']."</p>";
	//$product[]
	?>

<?php
	include "general/Footer.php";
?>
</body>
</html>