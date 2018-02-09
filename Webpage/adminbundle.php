<?php
	session_start();
    require "php-script/connessione.php";
	$DB= new DBAccess();
	$DB->openc();
    $P=$DB->getP();
    $val='';
    $bundle=false;
    if(isset($_POST['nome'])){
        $bundle=true;
        $val=$_POST['nome'];
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
    
    <div>
    
    <div id="prod">
        <span>Nome Bundle:</span>
    <form method="post" action="adminbundle.php">
    <input type='text' name="nome" value='<?php echo $val; ?>' />
    <input type='submit' name='crea' value='crea'/>
    </form>
        <table id="products">
            <thead>
                <tr>
                    <th>Prodotto</th>
                    <th>Prezzo</th>
                    <?php if(isset($_SESSION['login_user'])){echo "<th>      </th>";}?>
                </tr>
            </thead>
        <?php
            if($bundle){
            foreach($P as $x){
                echo "<tr>";
                echo "<td>";
                echo "<a href='productdetails.php?id=".$x["id"]."'>".$x["nome"]."</a>";
                echo "</td>";
                echo "<td>";
                echo $x["prezzo"]."€";
                echo "</td>";
                if(isset($_SESSION['login_user'])){
                $id=$x["id"];
                echo "<td>";
                echo "<form method='post' action='adminbundle.php'>";
                echo "<input type='submit' name='$id' value='Aggiungi al bundle'/>";
                }
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            }
    
        ?>
        </table>    
    
    
    </div>
    
    <div id="bundle">
        <table id="products">
            <thead>
                <tr>
                    <th>Prodotto</th>
                    <th>Prezzo</th>
                    <?php if(isset($_SESSION['login_user'])){echo "<th>      </th>";}?>
                </tr>
            </thead>
        <?php
            if($bundle){
            foreach($P as $x){
                echo "<tr>";
                echo "<td>";
                echo "<a href='productdetails.php?id=".$x["id"]."'>".$x["nome"]."</a>";
                echo "</td>";
                echo "<td>";
                echo $x["prezzo"]."€";
                echo "</td>";
                if(isset($_SESSION['login_user'])){
                $id=$x["id"];
                echo "<td>";
                echo "<form method='post' action='adminbundle.php'>";
                echo "<input type='submit' name='$id.r' value='Rimuovi dal bundle'/>";
                }
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            }
        ?>
        </table>    
    
    
    </div>
    </div>
    
<?php
	include "general/Footer.php";
?>
</body>
</html>