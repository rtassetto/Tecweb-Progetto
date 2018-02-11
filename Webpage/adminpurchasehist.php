<?php
session_start();
require 'php-script/connessione.php';
$DB=new DBAccess();
$DB->openc();
if($_SESSION['admin']!=true)
	header("location: home.php");
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
?>
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Gestione sito &#8594; Storia degli Acquisti </p> 
    </div>
	<a href="adminmenu.php">Torna Indietro</a>
	<h1>Storia degli Acquisti</h1>
	<table>
		<thead>
			<tr>
				<th>Compratore</th>
				<th>Prodotto</th>
				<th>Categoria</th>
				<th>Valutazione</th>
				<th>Id</th>
				<th>Data</th>
			<tr>
		</thead>
<?php	$query=$DB->getfullPH();
	foreach($query as $result){
		echo "<tr>
				<td>".$result["compratore"]."</td>
				<td>".$result["nome"]."</td>
				<td>".$result["categoria"]."</td>
				<td>".$result["valutazione"]."</td>
				<td>".$result["id"]."</td>
				<td>".$result["data"]."</td>
			  </tr>";
	}
	echo "</table>";
?>


<?php
	include "general/Footer.php";
?>
</body>
</html>