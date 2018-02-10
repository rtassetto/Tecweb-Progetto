<?php
session_start();
if($_SESSION['admin']==true){
	$path = $_SERVER['DOCUMENT_ROOT'];
}
else{
	header("location: /home.php");
}
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
        <p> Ti trovi in: Home &#8594; Gestione sito </p> 
    </div>

<h1>Pannello Amministrazione</h1>
<p><a href="adminproducts.php">Aggiunta/Modifica dei Prodotti</a></p>
<p><a href="adminaccounts.php">Gestione Accounts</a></p>
<p><a href="adminreview.php">Gestione Recensioni</a></p>
<p><a href="adminbundle.php">Aggiunta/Modifica Bundles</a></p>
<p><a href="adminpurchasehist.php">Storia degli Acquisti</a></p>
<?php
	include "general/Footer.php";
?>
</body>
</html>