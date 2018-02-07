<?php
session_start();

require "php-script/connessione.php";
$DB=new DBAccess();
$DB->openc();
if (isset($_POST["aggiungi"])){
	$nome=$_POST["nome"];
	$descrizione=$_POST["descrizione"];
	$prezzo=$_POST["prezzo"];
	$categoria=$_POST["categoria"];
	$DB->createProduct($nome, $categoria, $descrizione, $prezzo);
}
    $P=$DB->getP();
        foreach($P as $x){
            $z=$x['id'];
            if(isset($_POST[$z])){
                echo "$z";
                $DB->modifyProduct($z,$_POST["nome"],$_POST["categoria"],$_POST["descrizione"],$_POST["prezzo"]);
            }
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
<form id="aggiuntaProd" method="post" action="adminproducts.php">
<label for="nome">Nome del Prodotto:</label> <input type="text" name="nome"/>
<label for="categoria">Categoria:</label>
<select name="categoria">
  <option value="monitor">Monitor</option>
  <option value="hdd">HDD</option>
</select>
<label for="descrizione">Descrizione del Prodotto:</label> <textarea name="descrizione" rows="7"></textarea>
<label for="prezzo">Prezzo:</label><input type="text" name="prezzo"/>
<input type="submit" name="aggiungi" value="Crea"/>
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
			if(isset($_SESSION['login_user'])){
                $id=$x["id"];
                echo "<td>";
                echo "<form method='post' action='php-script/modificaProd.php'>";
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