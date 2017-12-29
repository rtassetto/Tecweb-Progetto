<!DOCTYPE html>
<html>
    <body>
        <h1>BANANA</h1>
        
        <p>banana</p>
        <?php
        require "connessione.php";
        $DB=new DBAccess();
        $conn=$DB->openDBConnection();
        if($conn){echo "yes";}
        else{echo "NO";}
        $a=$DB->getA();
        foreach($a as $x){
            
            echo "<span>".$x["Nome"]."</span>";
            
        }
        ?>
    </body>
    
</html>