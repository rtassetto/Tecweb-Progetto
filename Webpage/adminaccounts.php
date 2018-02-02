<?php
session_start();

require "php-script/connessione.php";
$DB=new DBAccess();
$DB->openc();
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
	include $path."/general/Meta.php";
?>
</head>
<body>
<?php
	include $path."/general/Header.php";
?>
<h1>Gestione Accounts</h1>

<?php
	$accountab=$DB->getUserlist();
	echo "<table><tr><th>Username</th><th>Tipo</th><th>email</th><th>Data Crezione</th><th></th></tr>";
	foreach($accountab as $result){
		if($result["admin"]==false){$type="Utente";}
		else{$type="Admin";}
		echo "<tr><td>".$result["username"]."</td><td>".$type."</td><td>".$result["email"]."</td><td>".$result["datacreazione"]."</td><td><button>Modifica privilegi</button></td></tr>";
	};
	echo "</table>";
	
	include $path."/general/Footer.php";
?>
</body>
</html>