<?php
session_start();

require "php-script/connessione.php";
require "php-script/controlli.php";
$DB=new DBAccess();
$DB->openc();
if (isset($_POST["aggiungi"])){
	$nome=$_POST["nome"];
    $errNome=nomeProdotto($nome);
	$descrizione=$_POST["descrizione"];
    $errDesc=descProdotto($descrizione);
    sostituzione($descrizione);
	$prezzo=$_POST["prezzo"];
    $errPrezzo=prezzo($prezzo);
	$categoria=$_POST["categoria"];
    if($errPrezzo=='ok'&& $errNome=='ok'&& $errDesc=='ok'){
	$DB->createProduct($nome, $categoria, $descrizione, $prezzo);
    }
}
    $P=$DB->getP();
        foreach($P as $x){
            $z=$x['id'];
            if(isset($_POST[$z])){
                $DB->modifyProduct($z,$_POST["nome"],$_POST["categoria"],$_POST["descrizione"],$_POST["prezzo"]);
            }
        }
if($_SESSION['admin']==true){
	$path = $_SERVER['DOCUMENT_ROOT'];
}
else{
	header("location: home.php");
}
?>
<!DOCTYPE HTML>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>
<title>Amministrazone Prodotti - Buy Tech</title>
<?php
	include "general/Meta.php";
?>
    
      
</head>
<body>
<?php
	include "general/Header.php";
?>
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Gestione sito &#8594; Aggiunta/Modifica prodotti </p> 
    </div>
	<a href="adminmenu.php">Torna Indietro</a>
<h2>Aggiunta Prodotto</h2>
<form id="aggiuntaProd" method="post" action="adminproducts.php">
<div class="formslot">
	<label for="nome">Nome del Prodotto:</label> 
	<input type="text" id="nome" name="nome" required/>
    <?php
   if (isset($_POST["aggiungi"])){
       if($errNome=='errore'){
           echo "<h5 class='red'>il nome può contenere solo lettere e valori numerici</h5>";
       }    
   }
   ?>
</div>
<div class="formslot">
<label for="categoria">Categoria:</label>
<select id=categoria name="categoria" required>
  <option value="" selected></option>  
  <option value="monitor" required>Monitor</option>
  <option value="hdd" required>HDD</option>
</select>
</div> 
<div class="formslot">
<label for="descrizione">Descrizione del Prodotto:</label> <textarea id='descrizione' name="descrizione" rows="7" required></textarea>
<?php
   if (isset($_POST["aggiungi"])){
       if($errDesc=='errore'){
           echo "<h5 class='red'>la descrizione non è corretta</h5>";
       }    
   }
   ?>
</div>
<div class="formslot">
<label for="prezzo">Prezzo:</label><input type="text" id='prezzo' name="prezzo"  required/>
<?php
   if (isset($_POST["aggiungi"])){
       if($errPrezzo=='errore'){
           echo "<h5 class='red'>il prezzo dev'essere un valore numerico</h5>";
       }    
   }
?>
</div>
<input type="submit" name="aggiungi" value="Crea"/>
</form>


<h2>Modifica Prodotto</h2>
        <table id="searchResult">
            <thead>
                <tr>
                    <th class='tablehead'>Prodotto</th>
                    <th class='tablehead'>Tipo</th>
                    <th class='tablehead'>Descrizione</th>
                    <th class='tablehead'>Valutazione</th>
                    <th class='tablehead'>Prezzo</th>
					<th class='tablehead'></th>
                </tr>
            </thead>
        <?php
		$result=$DB->getP();
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
            echo $x["valutazione"];
            echo "</td>";
            echo "<td>";
            echo $x["prezzo"];
            echo "</td>";
			if(isset($_SESSION['login_user'])){
                $id=$x["id"];
                echo "<td>";
                echo "<form method='post' action='modificaProd.php'>";
                echo "<input type='submit' name='$id' value='Modifica prodotto'/>";
            }
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        
        </table>
<?php
	include "general/Footer.php";
?>
</body>
</html>