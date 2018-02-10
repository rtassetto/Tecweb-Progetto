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
<?php
	include "general/Meta.php";
?>
</head>
<body>
<?php
	include "general/Header.php";
?>
<h1>Gestione Accounts</h1>

<?php
	$accountab=$DB->getUserlist();
	echo "<table>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Tipo</th>
				<th>E-mail</th>
				<th>Data Crezione</th>
				<th></th>
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
	echo "</table>";
	
	include "general/Footer.php";
?>
</body>
</html>