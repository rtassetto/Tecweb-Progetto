<?php

   class DBAccess {
	const HOST_DB= "localhost";
	const USERNAME= "root";
	const PASSWORD = "";
	const DATABASE_NAME= "dzago";
	
	public $connessione;
	
	public function openDBConnection() {
		
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
    public function getA(){
        $querySelect= "SELECT * FROM personaggi ORDER BY ID ASC";
        
		$queryResult= mysqli_query($this->connessione, $querySelect);
        if($queryResult){echo "ok";}
        $result=array();
        while($row=mysqli_fetch_assoc($queryResult)){
            $single=array("ID"=>$row["ID"],
                         "Nome"=>$row["Nome"],
                         "Descrizione"=>$row["Descrizione"]);
            array_push($result,$single);
        }
        return $result;
    }
   }
 $schifo=new DBAccess();
 $connessione=$schifo->openDBConnection();
 if($connessione==false) {echo "MERDA";}
 else {echo "YESSS";}
?>