<?php
	session_start();
    require "php-script/connessione.php";
	$DB= new DBAccess();
	$DB->openc();
    $P=$DB->getP();
    $B=$DB->getB();
	if($_SESSION['admin']!=true){
		header("location: home.php");}
    $nome='';
    $creazione=false;
    if(isset($_POST["crea"])){
        $creazione=true;
        $nome=$_POST['nome'];
        $descrizione=$_POST['descrizione'];
        $DB->creaB($nome,$descrizione);
        header("location:adminbundle.php?$nome=Modifica+bundle"); 
    }
    foreach($B as $x){
        $n=$x['nome'];
        if(isset($_GET[$n])){
            $nome=$n;
            $creazione=true;
            }
    }
    foreach($P as $x){
        $id=$x['id'];
        if(isset($_POST[$id])){
            $result=$DB->AggiungiPB($nome,$id);
        }
        if(isset($_POST[$id.'r'])){
            $DB->rimuoviPB($nome,$id);
        }
    }
    
    $PB=$DB->getPB($nome);
?>

<!DOCTYPE HTML>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>
<?php
	include "general/Meta.php";
?>
</head>
<body>
<?php
	include "general/Header.php";
?>
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Gestione sito &#8594; Aggiunta/Modifica bundles </p> 
    </div>
	<a href="adminmenu.php">Torna Indietro</a>
	<h1>Aggiunta/Modifica bundles</h1>
    <div>
    <p id="errore"><?php if(isset($result)) echo $result;?></p>
    <div id="prod">
        <?php
        if(!$creazione){
            echo "<form method='post' action='adminbundle.php'>";
            echo "<label for='nome'>Nome Bundle:</label><input type='text' name='nome'>";
            echo "<label for='descrizione'>Descrizione Bundle:</label><input type='textarea' name='descrizione'>";
            echo "<input type='submit' name='crea' value='Crea bundle'/>";
            echo "</form>";
         echo '<table id="products">';
            echo '<thead>';
                echo '<tr>';
               echo  '<th>Nome Bundle</th>';
               echo  '<th>        </th>';
               echo '</tr>';
               echo '</thead>';
               foreach($B as $x){
                echo "<tr>";
                echo "<td>";
                $nome=$x['nome'];
                echo $nome;
                echo "</td>";
                echo "<td>";
                echo "<form method='get' action='adminbundle.php'>";
                echo "<input type='submit' name='$nome' value='Modifica bundle'/>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
               }
        }
         if($creazione){
                echo "</table>";
        echo '<table id="products">';
            echo '<thead>';
                echo '<tr>';
               echo  '<th>Prodotto</th>';
               echo "<th>      </th>";
               echo '</tr>';
            echo '</thead>';
            
            foreach($PB as $x){
                $id=$x["id"].'r';
                echo "<tr>";
                echo "<td>";
                echo "<a href='productdetails.php?id=".$x["id"]."'>".$x["nome"]."</a>";
                echo "</td>";
                echo "<td>";
                echo "<form method='post' action='adminbundle.php?$nome=Modifica+bundle'>";
                echo "<input type='submit' name='$id' value='Rimuovi dal bundle'/>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
			}
		echo "</table>";
            }
    
        
        echo '</table>' 
        ?>
    
    
    </div>
    <?php
     if($creazione){
		echo "<a href='adminbundle.php'>Torna alla lista Bundles</a>";

        echo '<table id="products">';
            echo '<thead>';
                echo '<tr>';
               echo  '<th>Prodotto</th>';
                    echo '<th>Prezzo</th>';
                     if(isset($_SESSION['login_user'])){echo "<th>      </th>";}
               echo '</tr>';
            echo '</thead>';
        
           
            foreach($P as $x){
                echo "<tr>";
                echo "<td>";
                echo "<a href='productdetails.php?id=".$x["id"]."'>".$x["nome"]."</a>";
                echo "</td>";
                echo "<td>";
                echo $x["prezzo"]."€";
                echo "</td>";
                $id=$x["id"];
                echo "<td>";
                echo "<form method='post' action='adminbundle.php?$nome=Modifica+bundle'>";
                echo "<input type='submit' name='$id' value='aggiungi al bundle'/>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            }
        echo "</table>";
        echo "</div>"
        ?>
    </div>
    
<?php
	include "general/Footer.php";
?>
</body>
</html>