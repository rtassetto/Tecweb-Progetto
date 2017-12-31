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
        if($queryResult){echo "ok";}
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
   }
?>