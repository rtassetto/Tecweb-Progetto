<?php
session_start();
?>

<!DOCTYPE html>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<?php
	if(!isset($_SESSION['login_user'])){
		header("location: home.php");
	}
     require "php-script/connessione.php";
	 $DB= new DBAccess();
	 $DB->openc();
     $P=$DB->getP();
     $erroreR='';
     $errore=false;
     foreach($P as $x){         
         if(isset($_POST[$x['id']."1"])){
              if (!preg_match("/^[a-zA-Z'èà,.; ]*$/",$_POST["recensione"])) {
                  $erroreR = "solo lettere e spazi possono essere inseriti in questo campo";
                  $errore=true;
              }
              if(!$errore){
                  $testo=htmlspecialchars($_POST["recensione"]);
                  $testo=addslashes($testo);
                  $testo = str_replace ("à", "&agrave", $testo);
                  $testo = str_replace ("è", "&egrave", $testo);
                  $testo = str_replace ("ì", "&igrave", $testo);
                  $testo = str_replace ("ò", "&ograve", $testo);
                  $testo = str_replace ("ù", "&ugrave", $testo);
                  $valutazione=$_POST["voto"];
                  $prodotto=$x['id'];
                  $user=$_SESSION["login_user"];
                  $DB->aggiungiR($user,$prodotto,$testo,$valutazione);
              header("location: purchasehistory.php");
              }
              else{
                 $nome=$x['nome'];
                 $id=$x['id'];
              }
         }
         if(isset($_POST[$x['id']])){
             $nome=$x['nome'];
             $id=$x['id'];
         }
     }
    ?>
<html lang="it">
<head> 
<title>Aggiunta Recensione - Buy Tech</title>   
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
        <h3>Scrivi una recensione per il prodotto <?php echo $nome;?></h3>
        <form method="post" action="recensione.php">
        <textarea id="recensione" name="recensione" rows="10" cols="50" required><?php if(isset($_POST["recensione"])) echo $_POST["recensione"]; ?></textarea><span><?php echo $erroreR;?></span>
        <p>Immetti la tua valutazione</p>
        <input type="radio" name="voto"  value="1" required><span>1</span>
        <input type="radio" name="voto"  value="2" required><span>2</span>
        <input type="radio" name="voto"  value="3" required><span>3</span>
        <input type="radio" name="voto"  value="4" required><span>4</span>
        <input type="radio" name="voto"  value="5" required><span>5</span> 
        <input type="submit" name="<?php echo $id."1"; ?>" value="Aggiungi recensione"/>
        </form>
    </div>
    
    <?php
	require "general/Footer.php";
 ?>   
</body>

</html>