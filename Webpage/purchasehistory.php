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
    }
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
include "general/Header.php";
?>
    
    
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home -> Purchase History </p> 
    </div>
    
    
    
    <section id="content_prodotti">
        <table id="products">
            <thead>
                <tr>
                    <th>Prodotto</th>
                    <th>Tipo</th>
                    <th>Descrizione</th>
                    <th>Valutazione</th>
                    <th>Data</th>
                    <?php if(isset($_SESSION['login_user'])){echo "<th>      </th>";}?>
                </tr>
            </thead>
        <?php
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
                echo $x["data"];
                echo "</td>";
                if(isset($_SESSION['login_user'])){
                $id=$x["id"];
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<input type='submit' name='$id' value='Aggiungi Recensione'/>";
                }
                echo "</form>";
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