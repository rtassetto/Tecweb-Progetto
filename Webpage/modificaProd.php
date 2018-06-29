<!DOCTYPE html>
<?php 
    session_start();
    require "php-script/connessione.php";
    require "php-script/controlli.php";
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
        foreach($P as $x){
            $w=$x['id'];
            if(isset($_POST[$w.'mod'])){
                $nome=$_POST["nome"];
                $errNome=nomeProdotto($nome);
                sostituzione($nome);
	            $descrizione=$_POST["descrizione"];
                $errDesc=descProdotto($descrizione);
                sostituzione($descrizione);
	            $prezzo=$_POST["prezzo"];
                $errPrezzo=prezzo($prezzo);
	            $categoria=$_POST["categoria"];
                if($errPrezzo==false && $errNome==false && $errDesc==false){
                    $DB->modifyProduct($w,$nome,$categoria,$descrizione,$prezzo);
                    header("location: adminproducts.php");
                }
                $y=$x;
            }
        }
?>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>
<title>Modifica Prodotto - Amministrazione - Buy Tech</title>
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
    
    

<form id="modificaProd" method="post" action="modificaProd.php">
<div class="formslot">
	<label for="nome">Nome del Prodotto:</label> 
	<input type="text" id="nome" name="nome" oninput="checkNome()" value="<?php echo $y["nome"]?>"/>
    <?php
    echo "<h5 id='nomeerr' class='red'>";
   if (isset($_POST[$y['id'].'mod'])){
       if($errNome==true){
           echo "Il nome può contenere solo lettere e valori numerici";
       }  
    echo "</h5>";
   }
   ?>
</div>
<div class="formslot">
<label for="categoria">Categoria:</label>
<select name="categoria" id="categoria" selected="<?php echo $y["categoria"];?>">
  <option value="monitor"  <?php if($y["categoria"]=="Monitor")echo "selected"; ?> >Monitor</option>
  <option value="hdd"  <?php if($y["categoria"]=="HDD")echo "selected"; ?> >HDD</option>
    <option value="ssd"  <?php if($y["categoria"]=="SSD")echo "selected"; ?> >SSD</option>
    <option value="ram"  <?php if($y["categoria"]=="RAM")echo "selected"; ?> >RAM</option>
    <option value="motherboard"  <?php if($y["categoria"]=="Motherboard")echo "selected"; ?> >Motherboard</option>
    <option value="cpu"  <?php if($y["categoria"]=="CPU")echo "selected"; ?> >CPU</option>
    <option value="gpu"  <?php if($y["categoria"]=="GPU")echo "selected"; ?> >GPU</option>
    <option value="mouse"  <?php if($y["categoria"]=="Mouse")echo "selected"; ?> >Mouse</option>
</select>
</div>
<div class="formslot">
<label for="descrizione">Descrizione del Prodotto:</label> 
<textarea id='descrizione' name="descrizione" rows="7" oninput="checkDesc()" value="<?php echo $y["descrizione"];?>"></textarea>
<?php
   echo "<h5 id='descerr' class='red'>";
   if (isset($_POST[$y['id'].'mod'])){
       if($errDesc==true){
           echo "La descrizione non è corretta";
       }    
   }
    echo "</h5>";
?>
</div>
<div class="formslot">
<label for="prezzo">Prezzo:</label>
<input type="text" id='prezzo' name="prezzo" oninput="checkPrezzo()" value="<?php echo $y["prezzo"]?>"/>
<?php
     echo "<h5 id='prezzoerr' class='red'>";
   if (isset($_POST[$y['id'].'mod'])){
       if($errPrezzo==true){
           echo "Il prezzo dev'essere un valore numerico";
       }    
   }
   echo "</h5>";
?>
</div>
<div class="formslot">
<input type="submit" name='<?php echo $y['id'].'mod'; ?>' value="Modifica"/>
</div>
</form>

<a href="adminproducts.php">Torna indietro</a>

<script>
document.getElementById("descrizione").value = "<?php echo $y["descrizione"]?>";
</script>



<?php
	include "general/Footer.php";
?>