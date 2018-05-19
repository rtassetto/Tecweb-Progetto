<!DOCTYPE html>
<?php 
    session_start();
    require "php-script/connessione.php";
    require "php-script/controlli.php";
    $DB=new DBAccess();
    $conn=$DB->openc();
    
    if(isset($_POST["compraBundle"])){
		if(isset($_SESSION['login_user']))
            {
				$bundleresult=$DB->getBundlepartsdata($_GET['bundle']);
				foreach($bundleresult as $pi)
                $DB->aggiungiC($pi['id'],$_SESSION['login_user']);
        }else{
            echo "<p>Per effettuare un acquisto devi prima essere registrato!</p>";
        }
		header("location: prodotti.php");
	}
    if(isset($_GET["advancedSubmit"])){
        $categoria=$_GET["categoria"];
        $ordine=$_GET["ordine"];
        $P=$DB->ricercaAvanzata($categoria,$ordine);
        $a_nrisultati=count($P); 
        
    }else if(isset($_GET["testo"])){
        $testo2=$_GET["testo"];
        $testo=$testo2;
        sostituzione($testo2);
        $P=$DB->ricerca($testo2);
        $n_risultati=count($P);
        
    }else{
        $P=$DB->getP();
    }
    foreach($P as $x){
        $z=$x['id'];
        if(isset($_POST[$z])){
            if(isset($_SESSION['login_user']))
            {
                $DB->aggiungiC($z,$_SESSION['login_user']);
            }else{
                echo "<p>Per effettuare un acquisto devi prima essere registrato!</p>";
            }
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
    
    <title>Prodotti - Buy Tech</title>
</head>
    
<body>
  
<?php
    include "general/Header.php";
    
    
    
?>
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Prodotti </p> 
    </div>
      
<?php
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
    
    
    
    <div id="advSearch">
    <form method="get" action="prodotti.php" id="avdancedSearch" name="advancedSearch">
        <div id="ordinaCat">
        <label for="categoria">Filtra per:</label>
        <select id="categoria" name="categoria" required>
            <option value='' selected>Scegli categoria</option>
            <option value="Monitor">Monitor</option>
            <option value="HDD">HDD</option>
        </select> 
        </div>
        <div id="ordinaOrd">
        <label for="ordine">Filtra per ordine:</label>
        <select id="ordine" name="ordine" required size=''>
            <option value='' selected>Scegli ordine</option>
            <option value="preC">Prezzo crescente</option>
            <option value="preD">Prezzo decrescente</option>
            <option value="valC">Valutazione crescente</option>
            <option value="valD">Valutazione decrescente</option>
        </select>
        <input type="submit" name="advancedSubmit" value="Cerca" class="submit"/>
        </div>
    </form>
    </div>
    <?php
    if(isset($_GET["advancedSubmit"]))
    {
        if(isset($a_nrisultati)){
        if($a_nrisultati==0){
            echo "<p>Nessun risultato prodotto dalla ricerca avanzata</p>\n";
        }else if($_GET['categoria']!=" "){
            echo "<p>Trovati $a_nrisultati risultati per la categoria: '$categoria' </p>\n";
        }
    }
    }
    ?>
    <section id="content_prodotti">
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
                echo "<div class='prezzo'>";
                echo "Prezzo: ".$x["prezzo"]."€";
                echo "</div>";
                echo "</div>";
                echo "<div class='img'><img src='images/$id.jpg' alt='immagine prodotto'/>";
                echo "</div>";
                echo "<div class='dettaglio'><p><a href='productdetails.php?id=".$x["id"]."'>Vai al dettaglio</a></p>";
                echo "</div>";
                echo "</div>";
            }
        ?>   
    
    
    
    </section>
    
  <?php
	require "general/Footer.php";
?>  
</body>

</html>