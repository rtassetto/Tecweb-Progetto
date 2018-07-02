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
            echo "<p class='bigred'>Hai già inserito una recensione per questo prodotto, se inserisci un'altra recensione la precedente verrà sostituita.</p>";
        }
        ?>
        <h1>Scrivi una recensione per il prodotto <?php echo $nome;?></h1>
        <form class='login-form' method="post" action="recensione.php" aria-label="Inserisci recensione">
        <textarea id="rec" name="rec" rows="10" cols="50" oninput="checkRec()" required><?php if(isset($_POST["rec"])) echo $_POST["rec"]; ?></textarea>
        <fieldset>
		<legend>Immetti la tua valutazione</legend>
        <input type="radio" name="voto"  id="scoreone" value="1" required><label for="scoreone">1</label>
        <input type="radio" name="voto"  id="scoretwo" value="2" required><label for="scoretwo">2</label>
        <input type="radio" name="voto"  id="scorethree" value="3" required><label for="scorethree">3</label>
        <input type="radio" name="voto"  id="scorefour" value="4" required><label for="scorefour">4</label>
        <input type="radio" name="voto"  id="scorefive" value="5" required><label for="scorefive">5</label>
        <input id="aggrec" type="submit" onclick="recAlert()" name="<?php echo $id."1"; ?>"  value="Aggiungi recensione"/>
        </fieldset>
		</form>
        <div class="errori">
            <h5 id="descerr" class="red"><?php echo $erroreR;?></h5>
        </div>
        
        
    </div>
    
    <?php
	require "general/Footer.php";
 ?>   
</body>

</html>