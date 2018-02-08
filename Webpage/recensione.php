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
     $P=$DB->getP();
     foreach($P as $x){
         if(isset($_POST[$x['id']."1"])){
              $testo=htmlspecialchars($_POST["recensione"]);
              $valutazione=$_POST["voto"];
              $prodotto=$x['id'];
              $user=$_SESSION["login_user"];
              $DB->aggiungiR($user,$prodotto,$testo,$valutazione);
              header("location: purchasehistory.php");
         }
         if(isset($_POST[$x['id']])){
             $nome=$x['nome'];
             $id=$x['id'];
         }
     }
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
        <h3>Scrivi una recensione per il prodotto <?php echo $nome; echo $id;?></h3>
        <form method="post" action="recensione.php">
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
        <input type="submit" name="<?php echo $id."1"; ?>" value="Aggiungi recensione"/>
        </form>
    </div>
    
    <?php
	require "general/Footer.php";
 ?>   
</body>

</html>