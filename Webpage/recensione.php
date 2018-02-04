<?php
session_start();
?>

<!DOCTYPE html>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<?php
     require "php-script/connessione.php";
	 $DB= new DBAccess();
	 $DB->openc();
    ?>
<html lang="it">
<head>    
<?php
	require "general/Meta.php";
?>
    <title>Recensione</title>
</head>
    
<body>
    

<?php
	require "general/Header.php";
?>
    

    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Recensione </p> 
    </div>
    
    <div id="recensione">
        <h3>Scrivi una recensione per il prodotto <?php echo "NOME PRODOTTO QUI";?></h3>
        <form method="post" action="">
        <textarea name="recensione" rows="10" cols="50"></textarea>
        <p>immetti la tua valutazione</p>
        <select name="voto" size="1">
            <option value="none"></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>    
        <input type="submit" name="subr" value="Aggiungi recensione"/>
        </form>
    </div>
    
    <?php
	require "general/Footer.php";
 ?>   
</body>

</html>