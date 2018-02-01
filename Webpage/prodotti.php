<!DOCTYPE html>
<?php 
    session_start();
    require "php-script/connessione.php";
    $DB=new DBAccess();
    $conn=$DB->openc();
    $P=$DB->getP();
    foreach($P as $x){
        $z=$x['id'];
        if(isset($_POST[$z])){
            $DB->aggiungiC($z,$_SESSION['login_user']);
            echo $_POST[$z];
            echo $z;
            echo $_SESSION['login_user'];
        }
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
    $testo=$_GET["testo"];
    if($testo){
    $result=$DB->ricerca($testo);
    
    $n_risultati=count($result);
    
    if($n_risultati>0)
    {
        echo "<p> Trovati $n_risultati risultati per $testo</p>\n";
     ?>   
        <table id="searchResult">
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
        foreach($result as $x){
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

    <?php
    }else{
        echo "<p> Nessun risultato trovato per $testo</p>\n";
    }
    }else{
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
                echo $x["prezzo"]."€";
                echo "</td>";
                if(isset($_SESSION['login_user'])){
                $id=$x["id"];
                echo "<td>";
                echo "<form method='post' action='prodotti.php'>";
                echo "<input type='submit' name='$id' value='Aggiungi al carrello'/>";
                }
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
    }
        ?>
        </table>    
    
    
    </section>
    
    
<?php
include "general/Footer.php";
?>
    
</body>

</html>