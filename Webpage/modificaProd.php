<!DOCTYPE html>
<?php 
    session_start();
    require "php-script/connessione.php";
    $DB=new DBAccess();
    $conn=$DB->openc();
    if($_SESSION['admin']!=true){
        header("location: home.php");
    }
        $P=$DB->getP();
        foreach($P as $x){
            $z=$x['id'];
            if(isset($_POST[$z])){
                $y=$x;
            }
        }
?>

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
<?php
    echo "<p>Stai modificando il prodotto :<p>\n";
    ?>
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
            <tr>
                <td><?php echo $y["nome"]?></td>
                <td><?php echo $y["categoria"]?></td>
                <td><?php echo $y["descrizione"]?></td>
                <td><?php echo $y["valutazione"]?></td>
                <td><?php echo $y["prezzo"]?></td>
            </tr>
    </table>
    
    
    <a href="adminproducts.php">Torna indietro</a>

<form id="modificaProd" method="post" action="../adminproducts.php">
<label for="nome">Nome del Prodotto:</label> <input type="text" name="nome" value="<?php echo $y["nome"]?>"/>
<label for="categoria">Categoria:</label>
<select name="categoria" selected="<?php echo $y["categoria"];?>">
  <option value="monitor"  <?php if($y["categoria"]=="Monitor")echo "selected"; ?> >Monitor</option>
  <option value="hdd"  <?php if($y["categoria"]=="HDD")echo "selected"; ?> >HDD</option>
</select>
<label for="descrizione">Descrizione del Prodotto:</label> <textarea id="descarea" name="descrizione" rows="7" value="<?php echo $y["descrizione"];?>"></textarea>
<label for="prezzo">Prezzo:</label><input type="text" name="prezzo" value="<?php echo $y["prezzo"]?>"/>
<input type="submit" name='<?php echo $y['id'];?>' value="Modifica"/>
</form>
<script>
document.getElementById("descarea").value = "<?php echo $y["descrizione"]?>";
</script>

<?php
	include "general/Footer.php";
?>