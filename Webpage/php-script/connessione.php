<?php

   class DBAccess {
	const HOST_DB= "localhost";
	const USERNAME= "root";
	const PASSWORD = "";
	const DATABASE_NAME= "website";
	
	public $connessione;
	
	public function openc() {
		
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
    public function getP(){
        $querySelect= "SELECT * FROM prodotto";
        
		$queryResult= mysqli_query($this->connessione, $querySelect);
        $result=array();
        while($row=mysqli_fetch_assoc($queryResult)){
            $single=array("nome"=>$row["nome"],
                         "categoria"=>$row["categoria"],
                         "descrizione"=>$row["descrizione"],
                         "Valutazione"=>$row["Valutazione"],
                         "prezzo"=>$row["prezzo"]);
            array_push($result,$single);
        }
        return $result;
    }
       
       public function ricerca($testo){
        $querySelect= "SELECT * FROM prodotto WHERE(nome LIKE '%" . $testo . "%') OR(categoria LIKE '%" . $testo . "%') OR(descrizione LIKE '%" . $testo . "%') ";
        
		$queryResult= mysqli_query($this->connessione, $querySelect);
        $result=array();
        while($row=mysqli_fetch_assoc($queryResult)){
            $single=array("nome"=>$row["nome"],
                         "categoria"=>$row["categoria"],
                         "descrizione"=>$row["descrizione"],
                         "Valutazione"=>$row["Valutazione"],
                         "prezzo"=>$row["prezzo"]);
            array_push($result,$single);
        }
        return $result;
    }
	public function createUser($username, $password, $email){
		if(mysqli_num_rows(mysqli_query($this->connessione, "SELECT username FROM account WHERE username='$username';"))!=0)
			return 1;
		$data=date("Y-m-d H:i:s");
		if(!mysqli_query($this->connessione, "INSERT INTO account(username,password,email,datacreazione) VALUES ('$username','$password','$email','$data')")) //DA VERIFICARE SE CORRETTA PROCEDURA DI VERIFICA
			return 2;
		return 0;
	}
	public function addtoCart($nome,$prodotto,$quantita){
		mysqli_query($this->connessione, "INSERT INTO Carrello(username,prodotto,quantita) VALUES ('$nome','$prodotto','$quantita')")
	}
	public function createProduct($nome, $categoria, $descrizione,$prezzo){
		mysqli_query($this->connessione, "INSERT INTO Prodotto(nome,categoria,descrizione,prezzo) VALUES ('$nome','$categoria','$descrizione','$prezzo')");
	}
	public function addPurchase($user,$product,$quantity){
		$data=date("Y-m-d H:i:s");
		mysqli_query($this->connessione, "INSERT INTO Prodotto(compratore,prodotto,quantita,data) VALUES ('$user','$product','$quantity','$data')");
	}
	public function createReview($user,$product,$review,$vote,$data){
		$data=date("Y-m-d H:i:s");
		mysqli_query($this->connessione, "INSERT INTO Recensione(username,prodotto,review,voto,data) VALUES ('$user','$product','$review','$vote','$data')");
	}
	public function createBundle($nome,$descrizione,$bundleparts){
		$data=date("Y-m-d H:i:s");
		mysqli_query(this->connessione,"INSERT INTO Bundle(nome, descrizione,data) VALUES('$nome','#descrizione','$data')");
		for($i=0;!$bundleparts[$i];$i++){
				mysqli_query(this->connessione,"INSERT INTO Bundleparts(bundle, pezzo) VALUES('$nome','$bundleparts[$i]')");
		}
	}
	}
?>