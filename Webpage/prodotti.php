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
include "general/Header.php";
?>
    
    
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home -> Prodotti </p> 
    </div>
    
    
    
    <section id="content_prodotti">
        <table id="products">
            <thead>
                <tr>
                    <th>Prodotto</th>
                    <th>Tipo</th>
                    <th>Descrizione</th>
                    <th>Valutazione</th>
                    <th>Prezzo</th>
                </tr>
            </thead>
        <?php
            require "php-script\connessione.php";
            $DB=new DBAccess();
            $conn=$DB->openc();
            $P=$DB->getP();
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