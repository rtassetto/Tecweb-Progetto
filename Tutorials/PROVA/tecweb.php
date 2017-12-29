<?php
class DBAccess {
	const HOST_DB= "http://tecweb2016.studenti.math.unipd.it/phpmyadmin/";
	const USERNAME= "gcavalli";
	const PASSWORD = "ufu5zahj6Lah1rie";
	const DATABASE_NAME= "gcavalli";
	
	public $connessione;
	
	public funtion openDBConnection() {
		
		$this->connessione=mysqli_connect(	static::HOST_DB, 
											static::USERNAME, 
											static::PASSWORD, 
											static::DATABASE_NAME);
		if(!$this->connessione) {
			return false;
		} else {
			return true;
		}
	}
	
	public function getListCharacter() {
		$querySelect= "SELECT * FROM personaggi ORDER BY ID ASC";
		$queryResult= mysqli_query($hits->connection, $querySelect) or die (
			"Error in getListCharacters query: " . mysqli_error($this->connection));
		if(mysqli_num_rows($queryResults)==0) {
			return null;
		}
		else {
			$result = array();
			while($row=mysqli_fetch_assoc($queryResult)) {
				$arraySingleResult = array(
					"ID" => $row["ID"];
					"Nome" => $row["Nome"];
					"Specializzazione" => $row["Specializzazione"];
					"Qi" => $row["Qi"];
					"Immagine" => $row["Immagine"];
					"Descrizione" => $row["Descrizione"];
					);
				array_push($result, $arraySingleResult);
			}
			return $result;
					
				
		} //importante: meglio gestire la parte che stampa risultati in un'altra pagina php.
		//restituisce un array in cui ogni parte ha la descrizione del personaggio
	}
	
	
/*
	public function getListPersonaggi() {
		//recupera l'elenco dei personaggi nel database
		$queryChAndDescr="SELECT Nome, Descrizione FROM personaggi";
		$chAndDescr=mysqli_query($this->connection, $queryChAndDescr); //restituisce un oggetto risultato per recuperare il risultato della query
		
		if($characters->num_rows >0) {
			echo "<dl>";
			foreach($chAndDescr as $row) {
				echo "<dt>" . $row["Nome"] . "</dt>" . 
					"<dd>" . $row["Descrizione"] . "</dd>";
			}
			echo "</dl>"
		}
			
	}
	* */
}
?>

/*
	use DB\DBAccess;
	
*/
