<!DOCTYPE html>
<?php session_start();?>
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
require "general/Header.php";
?>
    
    
    
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home -> Carrello </p> 
    </div>
    
    
    
    <section id="prodotticarrello">
        <table id="products">
            <thead>
                <tr>
                    <th>Prodotto</th>
                    <th>Tipo</th>
                    <th>Descrizione</th>
                    <th>Valutazione</th>
                    <th>Prezzo</th>
                    <th>Quantità</th>
                </tr>
            </thead>
        <?php
            require "php-script\connessione.php";
            $DB=new DBAccess();
            $conn=$DB->openc();
            $username=$_SESSION["login_user"];
            $P=$DB->getCarrello($username);
            foreach($P as $x){
                echo "<tr>";
                echo "<td>";
                echo $x["nome"];
                echo "</td>";
                echo "<td>";
                echo $x["categoria"];
                echo "</td>";
                echo "<td>";
                echo $x["descrizione"];
                echo "</td>";
                echo "<td>";
                echo $x["Valutazione"];
                echo "</td>";
                echo "<td>";
                echo $x["prezzo"];
                echo "</td>";
                echo "<td>";
                echo $x["quantita"];
                echo "</td>";
                echo "</tr>";
            }
        ?>
        </table>    
        
    </section>
    
    
<?php
include "general/Footer.php";
?>
    
</body>

</html>