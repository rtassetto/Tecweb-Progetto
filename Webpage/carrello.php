<!DOCTYPE html>
<?php 
    session_start();
	if(!isset($_SESSION['login_user'])){
	header("location: home.php");
	}
    require "php-script/connessione.php";
    $DB=new DBAccess();
    $conn=$DB->openc();
    $P=$DB->getP();
    foreach($P as $x){
        $z=$x['id'];
        if(isset($_POST[$z])){
            $DB->eliminaC($z,$_SESSION['login_user']);
        }
    }
?>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>  
<title>Carrello - Buy Tech</title>  
<?php
	require "general/Meta.php";
?>
    <title>Prodotti</title>
</head>
    
<body>
    

<?php
require "general/Header.php";
?>
    
    
    
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Carrello </p> 
    </div>
    
    
    
    <section id="prodotticarrello">
        
      <?php
            $username=$_SESSION["login_user"];
            $P=$DB->getCarrello($username);
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
                echo "<div class='quantità'>";
                echo "Quantità: ".$x["quantita"];
                echo "</div>";
                echo "<div class='prezzo'>";
                echo "Prezzo: ".$x["prezzo"]*$x["quantita"]."€";
                echo "</div>";
                echo "</div>";
                echo "<div class='imgc'><img src='images/$id.jpg' alt='immagine prodotto'/>";
                echo "</div>";
                echo "</div>";
            }
        ?>   
    
    
    
    
            
                    
                <?php
                    $totale=0;
                    foreach($P as $y){
                        $totale+=$y["prezzo"]*$y["quantita"];
                    }    
                    echo "Totale : ".$totale." €";
                ?>
                    <form class="onclick" method="post" action="purchasehistory.php">
                        <input id='acquista' type="submit"  name="compra" value="Acquista"/>
                    </form>
               
        
    </section>
    
    
<?php
include "general/Footer.php";
?>
    
</body>

</html>