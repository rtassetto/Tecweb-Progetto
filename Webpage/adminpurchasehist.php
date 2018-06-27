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
<title>Visione Storia degli Acquisti - Buy Tech</title>
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
	<div class="tabelle">
    <table>
		<thead>
			<tr>
				<th class='tablehead'>Compratore</th>
				<th class='tablehead'>Prodotto</th>
				<th class='tablehead'>Categoria</th>
				<th class='tablehead'>Data</th>
                <th class='tablehead'>Valutazione</th>
				<th class='tablehead'>Id</th>
			<tr>
		</thead>
<?php	$query=$DB->getfullPH();
	foreach($query as $result){
		echo "<tr>
				<td>".$result["compratore"]."</td>
				<td>".$result["nome"]."</td>
				<td>".$result["categoria"]."</td>
                <td>".$result["data"]."</td>
				<td>".$result["valutazione"]."</td>
				<td>".$result["idordine"]."</td>
			  </tr>";
	}
	echo "</table></div>";
?>


<?php
	include "general/Footer.php";
?>
</body>
</html>