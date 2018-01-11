<!DOCTYPE html>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>    
    <meta charset="utf-8">
    <meta name="description" content="Sito web dedicato all'acquisto e pubblicazione di e-book."/>
    <meta name="keywords" content="ebook, ebook gratis, vendita ebook, e-book"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lotto Matteo, Tassetto Riccardo, Zago Davide"/>
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="stylesheet" href="style/print.css" media="print"/>
    <!--<link rel="stylesheet" href="style/small.css" media="handheld, screen and (max-width:480px), only screen and (max-device-width:480px)"/>--> 
    </head>

<?php
    require "connessione.php";
    $DB=new DBAccess();
    $conn=$DB->openc();

    $testo=$_POST["testo"];

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
</html>
    <?php
    }else{
        echo "<p> Nessun risultato trovato per $testo</p>\n";
    }

    
?>