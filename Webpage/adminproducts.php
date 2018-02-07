<?php
session_start();

require "php-script/connessione.php";
$DB=new DBAccess();
$DB->openc();
if (isset($_POST["submit"])){
    
	$nome=$_POST["nome"];
	$desc=$_POST["desc"];
	$prezzo=$_POST["prezzo"];
	$categoria=$_POST["categoria"];
	$DB->createProduct($nome, $categoria, $desc, $prezzo);
}
if($_SESSION['admin']==true){
	$path = $_SERVER['DOCUMENT_ROOT'];
}
else{
	header("location: /home.php");
}
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
<h1>Aggiunta/Modifica dei Prodotti</h1>
<h2>Aggiunta Prodotto</h2>
<form method="post" action="adminproducts.php">
<label for="nome">Nome del Prodotto:</label> <input type="text" name="nome"/>
<label for="categoria">Categoria:</label>
<select name="categoria">
  <option value="monitor">Monitor</option>
  <option value="hdd">HDD</option>
</select>
<label for="desc">Descrizione del Prodotto:</label> <textarea name="desc" rows="7"></textarea>
<label for="prezzo">Prezzo:</label><input type="text" name="prezzo"/>
<input type="submit" name="submit" value="Crea"/>
</form>

<h2>Modifica Prodotto</h2>
        <table id="searchResult">
            <thead>
                <tr>
                    <th>Prodotto</th>
                    <th>Tipo</th>
                    <th>Descrizione</th>
                    <th>Valutazione</th>
                    <th>Prezzo</th>
					<th></th>
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
            echo $x["Valutazione"];
            echo "</td>";
            echo "<td>";
            echo $x["prezzo"];
            echo "</td>";
			echo "<td>";
			echo "<button>Modifica</button>";
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