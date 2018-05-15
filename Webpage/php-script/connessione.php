<?php

   class DBAccess {
	   //DA MODIFICARE SUL SERVER DEL LAB
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
	
	//Account
	public function createUser($username, $password, $email){
		//Validazione form
		if ((strlen($username)<5) || (strlen($username)>20) || (strlen($password)<5) || (strlen($password)>20) || (strlen($email)<5) ||(strlen($email)>50)) 
			return 3;
		if(mysqli_num_rows(mysqli_query($this->connessione, "SELECT username FROM Account WHERE username='$username';"))!=0)
			return 1;
		if(mysqli_num_rows(mysqli_query($this->connessione, "SELECT email FROM Account WHERE email='$email';"))!=0)
			return 4;
		$data=date("Y-m-d H:i:s");
		if(!mysqli_query($this->connessione, "INSERT INTO Account(username,password,email,datacreazione,admin) VALUES ('$username','$password','$email','$data', 'false')"))
			return 2;
		return 0;
	}
	public function checkUser($username,$password){
		$query = mysqli_query($this->connessione,"SELECT * FROM Account WHERE username='$username' AND password='$password'");
		$row = mysqli_fetch_assoc($query);
		if ($row){
			if ($row['admin']==true){
			return "admin";
			}
			return "user";
		}
		return "error";
	}
	
	public function getUser($username){
		$query = mysqli_query($this->connessione,"SELECT username, email, datacreazione FROM Account WHERE username='$username'");
		return mysqli_fetch_assoc($query);
	}
	public function alterAdminright($username){
		mysqli_query($this->connessione,"UPDATE Account 
										 SET admin=NOT admin
										 WHERE username='$username'");
	}
	public function getUserlist(){
		$query=mysqli_query($this->connessione,"SELECT * FROM Account");
		for($i=0;$i<mysqli_num_rows($query);$i++){
			$result[$i]=mysqli_fetch_assoc($query);
		}
		return $result;
	}
	
	//Prodotto
    public function getP(){
        $querySelect= "SELECT * FROM Prodotto";
        
		$queryResult= mysqli_query($this->connessione, $querySelect);
        $result=array();
        while($row=mysqli_fetch_assoc($queryResult)){
            $single=array("nome"=>$row["nome"],
                         "categoria"=>$row["categoria"],
                         "descrizione"=>$row["descrizione"],
                         "valutazione"=>$row["valutazione"],
                         "prezzo"=>$row["prezzo"],
                         "id"=>$row["id"]);
            array_push($result,$single);
        }
        return $result;
    }
    public function ricerca($testo){
           
        $querySelect= "SELECT * FROM Prodotto WHERE(nome LIKE '%" . $testo . "%') OR(categoria LIKE '%" . $testo . "%') OR(descrizione LIKE '%" . $testo . "%') ";
        
		$queryResult= mysqli_query($this->connessione, $querySelect);
        $result=array();
        if($testo!=""){
            while($row=mysqli_fetch_assoc($queryResult)){
                $single=array("nome"=>$row["nome"],
                             "categoria"=>$row["categoria"],
                             "descrizione"=>$row["descrizione"],
                             "valutazione"=>$row["valutazione"],
                             "prezzo"=>$row["prezzo"],
                             "id"=>$row["id"]);
                array_push($result,$single);
            }
        }
        return $result;
    }
    public function ricercaAvanzata($categoria,$ordine){
        if($ordine=="valC")
        {
            $ordine="valutazione ASC";   
        }else if($ordine=="valD")
        {
           $ordine="valutazione DESC";
        }else if($ordine=="preC")
        {
           $ordine="prezzo ASC";
        }else{
            $ordine="prezzo DESC";
        }
        
        if($ordine==" "){
            $ordine="id";
        }
        if($categoria==" ")
        {
            $querySelect="SELECT * FROM Prodotto WHERE 1=1 ORDER BY $ordine";
        }else{
            $querySelect="SELECT * FROM Prodotto WHERE(categoria='$categoria') ORDER BY $ordine";
        }
       
       $queryResult=mysqli_query($this->connessione,$querySelect);
       $result=array();
       while($row=mysqli_fetch_assoc($queryResult)){
            $single=array("nome"=>$row["nome"],
                         "categoria"=>$row["categoria"],
                         "descrizione"=>$row["descrizione"],
                         "valutazione"=>$row["valutazione"],
                         "prezzo"=>$row["prezzo"],
                          "id"=>$row["id"]);
            array_push($result,$single);
        }
       return $result;
    }     
	public function createProduct($nome, $categoria, $descrizione,$prezzo){
		mysqli_query($this->connessione, "INSERT INTO Prodotto(nome,categoria,descrizione,prezzo) VALUES ('$nome','$categoria','$descrizione','$prezzo')");
	}
	public function getProddata($id){
		$query = mysqli_query($this->connessione,"SELECT * FROM Prodotto WHERE id='$id'");
		return mysqli_fetch_assoc($query);
	}
    public function modifyProduct($id, $nome, $categoria, $descrizione, $prezzo){
        mysqli_query($this->connessione,"UPDATE Prodotto SET nome='$nome',categoria='$categoria',descrizione='$descrizione',prezzo='$prezzo' WHERE id='$id'") or die (
			"Error in modifyProductquery: " . mysqli_error($this->connessione));
    }
	public function getBestselling(){
		$query=mysqli_query($this->connessione,"SELECT p.id, p.nome, p.categoria, p.valutazione, p.prezzo FROM Prodotto p JOIN PurchaseHistory ph on (p.id= ph.prodotto) GROUP by p.id ORDER by sum(ph.quantita) desc LIMIT 3 ");
        $result=array();
		for($i=0;$i<mysqli_num_rows($query);$i++){
			$result[$i]=mysqli_fetch_assoc($query);
		}
		return $result;
	}
	
	//PurchaseHistory
	public function getfullPH(){
		$query="SELECT compratore,nome,categoria,valutazione,idordine,data FROM PurchaseHistory JOIN Prodotto WHERE prodotto=id ORDER BY idordine asc";
        $qresult=mysqli_query($this->connessione, $query)or die (
			"Error in getPH query: " . mysqli_error($this->connessione));
		for($i=0;$i<mysqli_num_rows($qresult);$i++){
			$result[$i]=mysqli_fetch_assoc($qresult);
		}
		return $result;
	}
	public function getPH($name){
        $query="SELECT nome,categoria,descrizione,valutazione,id,data FROM PurchaseHistory JOIN Prodotto WHERE compratore='$name' AND prodotto=id";
        $qresult=mysqli_query($this->connessione, $query)or die (
			"Error in getPH query: " . mysqli_error($this->connessione));
        $result=array();
        while($row=mysqli_fetch_assoc($qresult)){
            $single=array("nome"=>$row["nome"],
                         "categoria"=>$row["categoria"],
                         "descrizione"=>$row["descrizione"],
                         "valutazione"=>$row["valutazione"],
                         "id"=>$row["id"],
                         "data"=>$row["data"]);
            array_push($result,$single);
        }
        return $result;
    }
    public function acquista($user,$id,$q){
       $insert="INSERT INTO `PurchaseHistory`(`compratore`, `prodotto`, `data`, `quantita`) VALUES ('$user','$id',NOW(),'$q')";
       mysqli_query($this->connessione, $insert);
       $delete="DELETE FROM `Carrello` WHERE username='$user' AND prodotto='$id'";
       mysqli_query($this->connessione, $delete);
    }
	
	//Carrello
    public function eliminaC($id,$user){
        $update="UPDATE Carrello SET quantita=quantita-1 WHERE username='$user' AND prodotto='$id' ";
        $query="SELECT * FROM Carrello WHERE username='$user' AND prodotto='$id'AND quantita>1";
        $delete="DELETE FROM `Carrello` WHERE username='$user' AND prodotto='$id'";
        $queryResult=mysqli_query($this->connessione, $query);
        if(mysqli_num_rows($queryResult)==0){
            mysqli_query($this->connessione, $delete);
        }else{
            mysqli_query($this->connessione, $update);
        }
    }
    public function aggiungiC($id,$name){
        $query="SELECT * FROM Carrello WHERE username='$name' AND prodotto='$id'";
        $queryResult=mysqli_query($this->connessione, $query);
        if(mysqli_num_rows($queryResult)==0){
            $insert="INSERT INTO `Carrello`(`username`, `prodotto`, `quantita`) VALUES ('$name','$id','1')";
            mysqli_query($this->connessione, $insert)or die (
			"Error in aggiungiC query: " . mysqli_error($this->connessione));
        }
        else {
            $update="UPDATE Carrello SET quantita=quantita+1 WHERE username='$name' AND prodotto='$id' ";
            mysqli_query($this->connessione, $update)or die (
			"Error in aggiungiC query: " . mysqli_error($this->connessione));
        }
    }
    public function getCarrello($user){
        $querySelect= "SELECT nome,categoria, descrizione, valutazione, prezzo, quantita, id FROM Prodotto JOIN Carrello WHERE username='$user' AND prodotto=id";
        
		$queryResult= mysqli_query($this->connessione, $querySelect) or die (
			"Error in getListCharacters query: " . mysqli_error($this->connessione));
        $result=array();
        while($row=mysqli_fetch_assoc($queryResult)){
            $single=array("nome"=>$row["nome"],
                         "categoria"=>$row["categoria"],
                         "descrizione"=>$row["descrizione"],
                         "valutazione"=>$row["valutazione"],
                         "prezzo"=>$row["prezzo"],
                         "quantita"=>$row["quantita"],
                         "id"=>$row["id"]);
            array_push($result,$single);
        }
        return $result;
    } 
	public function addtoCart($nome,$prodotto,$quantita){
		mysqli_query($this->connessione, "INSERT INTO Carrello(username,prodotto,quantita) VALUES ('$nome','$prodotto','$quantita')");
	}
	
	//Recensione
    public function aggiungiR($name,$prodotto,$testo,$voto){
		if(mysqli_num_rows(mysqli_query($this->connessione,"SELECT * FROM Recensione WHERE username='$name' and prodotto='$prodotto' "))!=0)
			mysqli_query($this->connessione,"DELETE FROM Recensione WHERE username='$name' and prodotto='$prodotto'" );
        $insert="INSERT INTO `Recensione`(`username`, `prodotto`, `review`, `voto`, `data`) VALUES ('$name','$prodotto','$testo','$voto',NOW())";
        mysqli_query($this->connessione, $insert)or die (
			"Errore nell' inserimento della recensione: " . mysqli_error($this->connessione));
    }
	public function getProdReview($id){
		$query = mysqli_query($this->connessione,"SELECT username,review,voto,data
												  FROM Recensione
												  WHERE prodotto='$id'");
		if(mysqli_num_rows($query)==0)
			return false;
		for($i=0;$i<mysqli_num_rows($query);$i++){
			$result[$i]=mysqli_fetch_assoc($query);
		}
		return $result;
	}
	
	//Bundles
	public function createBundle($nome,$descrizione,$bundleparts){
		$data=date("Y-m-d H:i:s");
		mysqli_query($this->connessione,"INSERT INTO Bundle(nome, descrizione,data) VALUES('$nome','$descrizione','$data')");
		for($i=0;!$bundleparts[$i];$i++){
				mysqli_query($this->connessione,"INSERT INTO BundleParts(bundle, pezzo) VALUES('$nome','$bundleparts[$i]')");
		}
	}
	public function getLatestBundles(){
		$query=mysqli_query($this->connessione,"SELECT * FROM Bundles ORDER by data desc LIMIT 3");
        $result=array();
        while($row=mysqli_fetch_assoc($query)){
            $single=array("nome"=>$row["nome"],
                         "descrizione"=>$row["descrizione"],
                         "data"=>$row["data"]);
            array_push($result,$single);
        }
        return $result;
		//substr($row["descrizione"], 0, 200)."...</p></td></tr>";
		
	}
    public function getB(){
        $query='SELECT nome FROM Bundles';
        $queryresult=mysqli_query($this->connessione,$query) or die("errore richiesta bundle".mysqli_error($this->connessione));
        $result=array();
        while($row=mysqli_fetch_assoc($queryresult)){
            $single=array('nome'=>$row['nome']);
            array_push($result,$single);
        }
       return $result;
    }
    public function getPB($nome){
        $query="SELECT id,Prodotto.nome FROM BundleParts JOIN Prodotto WHERE BundleParts.bundle='$nome' AND pezzo=id";
        $queryresult=mysqli_query($this->connessione,$query) or die("errore richiesta bundle".mysqli_error($this->connessione));
        $result=array();
        while($row=mysqli_fetch_assoc($queryresult)){
            $single=array('nome'=>$row['nome'],
                          'id'=>$row['id']);
            array_push($result,$single);
        }
       return $result;
    }
	public function getBundle($bundle){
		$query=mysqli_query($this->connessione,"SELECT * FROM Bundles WHERE nome='$bundle'");
		return mysqli_fetch_assoc($query);
	}
	public function getBundlepartsdata($bundle){
		$query=mysqli_query($this->connessione,"SELECT p.id, p.nome, p.categoria, p.valutazione, p.prezzo FROM Prodotto p JOIN BundleParts bp WHERE p.id=bp.pezzo and bp.bundle='$bundle'") or die("errore richiesta bundle".mysqli_error($this->connessione));
		if(mysqli_num_rows($query)==0)
			return "vuoto";
		for($i=0;$i<mysqli_num_rows($query);$i++){
			$result[$i]=mysqli_fetch_assoc($query);
		}
		return $result;
	}
    public function aggiungiPB($nome,$id){
	if(mysqli_num_rows(mysqli_query($this->connessione,"SELECT * FROM BundleParts WHERE bundle='$nome' and pezzo='$id' "))!=0){return "prodotto gia' inserito";};
        $insert="INSERT INTO `BundleParts`(`bundle`, `pezzo`) VALUES ('$nome','$id')";
        mysqli_query($this->connessione,$insert) or die("errore nell'inserimento nel bundle".mysqli_error($this->connessione));
    }
    public function rimuoviPB($nome,$id){
		$delete="DELETE FROM BundleParts WHERE Bundle='$nome' AND pezzo='$id'";
		mysqli_query($this->connessione,$delete) or die("errore nella rimozione del prodotto dal bundle".mysqli_error($this->connessione));
    }
    public function creaB($nome,$descrizione){
        $insert="INSERT INTO Bundles (nome,descrizione,data) VALUES ('$nome','$descrizione',NOW())";
        mysqli_query($this->connessione,$insert) or die("errore nella creazione del bundle".mysqli_error($this->connessione));
    }
	}
	
?>