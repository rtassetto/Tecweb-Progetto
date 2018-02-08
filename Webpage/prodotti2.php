<!DOCTYPE html>
<?php 
    session_start();
    require "php-script/connessione.php";
    $DB=new DBAccess();
    $conn=$DB->openc();
    
    
    if(isset($_GET["advancedSubmit"])){
        if(($_GET["categoria"]!=" ")&&(($_GET["ordine"])!=" "))
        {
            $categoria=$_GET["categoria"];
            $ordine=$_GET["ordine"];
            $P=$DB->ricercaAvanzata($categoria,$ordine);
            $a_nrisultati=count($P);
        }else{
            $P=$DB->getP(); //aggiunto per evitare errore, si potrebbe sistemare
        }
            
    }else if(isset($_GET["testo"])){
        $testo=$_GET["testo"];
        $P=$DB->ricerca($testo);
        $n_risultati=count($P);
        
    }else{
        $P=$DB->getP();
    }
    foreach($P as $x){
        $z=$x['id'];
        if(isset($_POST[$z])){
            $DB->aggiungiC($z,$_SESSION['login_user']);
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
    if(isset($testo)){
        if($testo==""){
            echo "<p> Inserire un nome valido nella ricerca </p>\n";
        }
        else if($n_risultati>0)
        {
            echo "<p> Trovati $n_risultati risultati per $testo</p>\n";  

        }else{
            echo "<p> Nessun risultato trovato per $testo</p>\n";
        }
    }
    ?>
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Prodotti </p> 
    </div>
    
    
    <form method="get" action="prodotti2.php" id="avdancedSearch" name="advancedSearch">
        <label for="categoria">Filtra per:</label>
        <select id="categoria" name="categoria" required>
            <option value=" " selected>Scegli categoria</option>
            <option value="Monitor">Monitor</option>
            <option value="HDD">HDD</option>
        </select> 
        
        <label for="ordine">Filtra per ordine:</label>
        <select id="ordine" name="ordine" required>
            <option value=" " selected>Scegli ordine</option>
            <option value="preC">Prezzo crescente</option>
            <option value="preD">Prezzo decrescente</option>
            <option value="valC">Valutazione crescente</option>
            <option value="valD">Valutazione decrescente</option>
        </select>
        
        <input type="submit" name="advancedSubmit" value="Cerca"/>
    </form>
    <?php
    if(isset($_GET["advancedSubmit"]))
    {
        if(($_GET["categoria"]==" ")||(($_GET["ordine"])==" ")){
            echo "<p> Selezionare un valore per entrambi i filtri </p>";
        }
     }else if(isset($a_nrisultati)){
        if($a_nrisultati==0){
            echo "<p>Nessun risultato prodotto dalla ricerca avanzata</p>\n";
        }else{
            echo "<p>Trovati $a_nrisultati risultati per la categoria: '$categoria' </p>\n";
        }
    }
    ?>
    <section id="content_prodotti">
        <?php
            foreach($P as $x){
                echo "<div class='prodotto'>";
                echo "<div class='img'><img src='images/hdd.jpg' alt='immagine prodotto'/>";
                echo "</div>";
                echo "<div class='nome'>";
                echo $x["nome"];
                echo "</div>";
                echo "<div class='categoria'>";
                echo "Categoria: ".$x["categoria"];
                echo "</div>";
                echo "<div class='descrizione'>";
                echo $x["descrizione"];
                echo "</div>";
                echo "<div class='valutazione'>";
                echo "Valutazione: ".$x["Valutazione"];
                echo "</div>";
                echo "<div class='prezzo'>";
                echo "Prezzo: ".$x["prezzo"]."€";
                echo "</div>";
                echo "<div class='dettaglio'><p><a href='prodotti2.php'>Vai al dettaglio</a></p>";
                echo "</div>";
                echo "</div>";
            }
        ?>   
    
    
    
    </section>
    
    
</body>

</html>