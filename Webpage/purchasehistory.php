<!DOCTYPE html>
<?php 
    session_start();
    require "php-script/connessione.php";
    $DB=new DBAccess();
    $conn=$DB->openc();
    if(isset($_POST["compra"])){
        $C=$DB->getCarrello($_SESSION['login_user']);
        foreach($C as $x){
            $id=$x["id"];
            $quantita=$x["quantita"];
            $DB->acquista($_SESSION['login_user'],$id,$quantita);
        }
    }
    if(isset($_SESSION["login_user"])){
        $P=$DB->getPH($_SESSION['login_user']);
        $S=$DB->getP();
    }
	else{header("location: home.php");}
?>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>    
<?php
	require "general/Meta.php";
?>
    <title>Storico acquisti - Buy Tech</title>
</head>
    
<body>
    

<?php
include "general/Header.php";
?>
   
    
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Account &#8594; Storico acquisti </p> 
    </div>
    
    
    
    <section id="prodottipurchase">
       <?php
            foreach($P as $x){
                $id=$x['id'];
                echo "<div class='prodotto'>";
                echo "<div class='nome'>";
                echo "<a href='productdetails.php?id=".$x["id"]."'>".$x["nome"]."</a>";  
                echo "</div>";
                echo "<div class='info'>";
                echo "<div class='categoria'>";
                echo "Categoria: ".$x["categoria"];
                echo "</div>";
                echo "<div class='descrizione'>";
                echo substr($x["descrizione"], 0, 200)."...";
                echo "</div>";
                echo "<div class='valutazione'>";
                echo "Valutazione: ".$x["valutazione"]."/5";
                echo "</div>";
                echo "</div>";
                echo "<div class='img'><img src='images/$id.jpg' alt='immagine prodotto'/>";
                echo "</div>";
                echo "<div class='button'>";
                echo "<form method='post' action='recensione.php'>";
                echo "<input type='submit' name='$id' value='Aggiungi Recensione'/>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        ?>   
    
    
    
    </section>
    
    
<?php
include "general/Footer.php";
?>
    
</body>

</html>