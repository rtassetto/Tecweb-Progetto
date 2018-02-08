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
	include $path."/general/Meta.php";
?>
</head>
<body>
<?php
	include $path."/general/Header.php";
?>


<?php
	include $path."/general/Footer.php";
?>
</body>
</html>