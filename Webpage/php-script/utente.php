<?php
class utente{
    const nome="xxx";
    const isAdmin=false;
    public function isR($name,$pass,$DB){
        
        $query="SELECT username,password FROM account ";
        $queryResult= mysqli_query($DB->connessione, $query);
        $result=array();
        while($row=mysqli_fetch_assoc($queryResult)){
            $single=array("username"=>$row["username"],
                         "password"=>$row["password"]);
            array_push($result,$single);
        }
        foreach($result as $x){
            if($x["username"]==$name && $x["password"]==$pass){
                return true;
            }
        }
        return false;
    }
}

?>