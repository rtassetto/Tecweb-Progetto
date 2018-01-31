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
                         "prezzo"=>$row["prezzo"],
                         "id"=>$row["id"]);
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
		mysqli_query($this->connessione, "INSERT INTO Carrello(username,prodotto,quantita) VALUES ('$nome','$prodotto','$quantita')");
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
		mysqli_query($this->connessione,"INSERT INTO bundle(nome, descrizione,data) VALUES('$nome','$descrizione','$data')");
		for($i=0;!$bundleparts[$i];$i++){
				mysqli_query($this->connessione,"INSERT INTO Bundleparts(bundle, pezzo) VALUES('$nome','$bundleparts[$i]')");
		}
	}
	public function getLatestBundles(){
		$result=mysqli_query($this->connessione,"SELECT * FROM bundles ORDER by data desc LIMIT 6");
		while ($row = $result->fetch_assoc()) {
			echo '<tr><td><p id="bundlename">'.$row["nome"].'</p> <p id="bundledesc">'. substr($row["descrizione"], 0, 20).'...</p></td></tr>';
		}
	}
	public function checkUser(){
		$query = mysqli_query($DB->connessione,"SELECT admin FROM account WHERE username='$username' AND password='$password'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1){
			if ($query=0){
			return "admin";
			}
			return "user";
		}
		return "error";
	}
    public function getCarrello($user){
        $querySelect= "SELECT nome,categoria, descrizione, Valutazione, prezzo, quantita, id FROM prodotto JOIN carrello WHERE username='$user' AND prodotto=id";
        
		$queryResult= mysqli_query($this->connessione, $querySelect) or die (
			"Error in getListCharacters query: " . mysqli_error($this->connessione));
        $result=array();
        while($row=mysqli_fetch_assoc($queryResult)){
            $single=array("nome"=>$row["nome"],
                         "categoria"=>$row["categoria"],
                         "descrizione"=>$row["descrizione"],
                         "Valutazione"=>$row["Valutazione"],
                         "prezzo"=>$row["prezzo"],
                         "quantita"=>$row["quantita"],
                         "id"=>$row["id"]);
            array_push($result,$single);
        }
        return $result;
    } 
    public function acquista($user,$id,$q){
       $insert="INSERT INTO `purchasehistory`(`compratore`, `prodotto`, `data`, `quantita`) VALUES ('$user','$id',NOW(),'$q')";
       mysqli_query($this->connessione, $insert);
       $delete="DELETE FROM `carrello` WHERE username='$user' AND prodotto='$id'";
       mysqli_query($this->connessione, $delete);
    }
    public function aggiungiC($id,$name){
        $query="SELECT * FROM carrello WHERE username='$name' AND prodotto='$id'";
        $queryResult=mysqli_query($this->connessione, $query);
        if(mysqli_num_rows($queryResult)==0){
            $insert="INSERT INTO `carrello`(`username`, `prodotto`, `quantita`) VALUES ('$name','$id','1')";
            mysqli_query($this->connessione, $insert)or die (
			"Error in aggiungiC query: " . mysqli_error($this->connessione));
        }
        else {
            $update="UPDATE carrello SET quantita=quantita+1 WHERE username='$name' AND prodotto='$id' ";
            mysqli_query($this->connessione, $update)or die (
			"Error in aggiungiC query: " . mysqli_error($this->connessione));
        }
    }
    public function getPH($name){
        $query="SELECT nome,categoria,descrizione,Valutazione,id,data FROM purchasehistory JOIN prodotto WHERE compratore='$name' AND prodotto=id";
        $qresult=mysqli_query($this->connessione, $query)or die (
			"Error in getPH query: " . mysqli_error($this->connessione));
        $result=array();
        while($row=mysqli_fetch_assoc($qresult)){
            $single=array("nome"=>$row["nome"],
                         "categoria"=>$row["categoria"],
                         "descrizione"=>$row["descrizione"],
                         "Valutazione"=>$row["Valutazione"],
                         "id"=>$row["id"],
                         "data"=>$row["data"]);
            array_push($result,$single);
        }
        return $result;
    }
	}
?>