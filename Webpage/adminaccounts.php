<?php
session_start();

require "php-script/connessione.php";
$DB=new DBAccess();
$DB->openc();
if($_SESSION['admin']==true){
	if(isset($_GET['type'])){
		if($_GET['type']=="edit"){
			$DB->alterAdminright($_GET['user']);
		}
		header("location: adminaccounts.php");
	}	
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
<title>Amministrazione Account - Buy Tech</title>
<?php
	include "general/Meta.php";
?>
</head>
<body>
<?php
	include "general/Header.php";
?>
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home &#8594; Gestione sito &#8594; Gestione accounts </p> 
    </div>
	<a href="adminmenu.php">Torna Indietro</a>
	<h1>Gestione Accounts</h1>
<?php
	$accountab=$DB->getUserlist();
	echo "<table>
			<tbody>
				<tr class='tablehead'>
					<th class='tablehead'>Username</th>
					<th class='tablehead'>Password</th>
					<th class='tablehead'>Tipo</th>
					<th class='tablehead'>E-mail</th>
					<th class='tablehead'>Data Crezione</th>
					<th class='tablehead'></th>
				</tr>";
	foreach($accountab as $result){
		if($result["admin"]==false){$type="Utente";}
		else{$type="Admin";}
		echo "<tr><td>".$result["username"]."</td>
		<td>".$result["password"]."</td>
		<td>".$type."</td>
		<td>".$result["email"]."</td>
		<td>".$result["datacreazione"]."</td>";
		
		if ($_SESSION['login_user']!=$result["username"]){
		echo "
		<td>
			<a href='adminaccounts.php?type=edit&user=".$result["username"]."'>Cambia privilegi</a>
		</td>";
		}
		else{echo "<td></td>";}
	}
	echo "</tbody>
		</table>";
	
	include "general/Footer.php";
?>
</body>
</html>