<!DOCTYPE html>

<?php
	session_start();
    require "php-script/connessione.php";
	$DB= new DBAccess();
	$DB->openc();
?>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>    
<?php
	require "general/Meta.php";
?>
    <title>Prodotti</title>
</head>
    
<body>
    

<?php
	require ("general/Header.php");
?>
    
    
    
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Chi siamo </p> 
    </div>
 <?php
	require "general/Footer.php";
 ?>  
    
</body>

</html>