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
     require "php-script/controlli.php";
	 $DB= new DBAccess();
	 $DB->openc();
     $P=$DB->getP();
     $erroreR='';
     $errore=false;
     foreach($P as $x){         
         if(isset($_POST[$x['id']."1"])){
              $testo=$_POST["rec"];
              desc($testo,$erroreR,$errore); 
              if(!$errore){
                  sostituzione($testo);
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
        <?php
        $user=$_SESSION['login_user'];
        $isPresent=$DB->checkR($id,$user); 
        if($isPresent){
            echo "<h2 class='red'>Hai già inserito una recensione per questo prodotto, se inserisci un'altra recensione la precedente verrà sostituita.</h2>";
        }
        ?>
        <h3>Scrivi una recensione per il prodotto <?php echo $nome;?></h3>
        <form class='login-form' method="post" action="recensione.php">
        <textarea id="rec" name="rec" rows="10" cols="50" required><?php if(isset($_POST["rec"])) echo $_POST["rec"]; ?></textarea><span><?php echo $erroreR;?></span>
        <p>Immetti la tua valutazione</p>
        <input type="radio" name="voto"  value="1" required><span>1</span>
        <input type="radio" name="voto"  value="2" required><span>2</span>
        <input type="radio" name="voto"  value="3" required><span>3</span>
        <input type="radio" name="voto"  value="4" required><span>4</span>
        <input type="radio" name="voto"  value="5" required><span>5</span> 
        <input id="aggrec" type="submit" name="<?php echo $id."1"; ?>"  value="Aggiungi recensione"/>
        </form>
        
    </div>
    
    <?php
	require "general/Footer.php";
 ?>   
</body>

</html>