<!DOCTYPE html>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<html lang="it">
<head>    
    <meta charset="utf-8">
    <meta name="description" content="Sito web dedicato all'acquisto e pubblicazione di e-book."/>
    <meta name="keywords" content="ebook, ebook gratis, vendita ebook, e-book"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lotto Matteo, Tassetto Riccardo, Zago Davide"/>
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="stylesheet" href="style/print.css" media="print"/>
    <!--<link rel="stylesheet" href="style/small.css" media="handheld, screen and (max-width:480px), only screen and (max-device-width:480px)"/>--> 

    <title>Prodotti</title>
</head>
    
<body>
    

    <header>
        <img id="logo" src="images/Capcom_logo.png" alt="Logo sito"/>        
        <nav>
            <ul>
                <li><a class="current" href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="chi_siamo.html">Chi siamo</a></li>
                <li><a href="prodotti.php">Prodotti</a></li>
                <li><form action="php-script/cerca.php" method="post">
                    <button id="searchButton" type="submit">Go</button>
                    <input id="search" type="text" name="testo" placeholder="Cerca..."></form> 
                </li>
            </ul>
        </nav>
    </header>
    
    
    
    <!--  Link per fissare menù "http://bigspotteddog.github.io/ScrollToFixed/" serve js!!!!-->
    
    
    <div id="breadcrumb"> 
        <p> Ti trovi in: Home -> Prodotti </p> 
    </div>
    
    
    
    <section id="content_prodotti">
        <table id="products">
            <thead>
                <tr>
                    <th>Prodotto</th>
                    <th>Tipo</th>
                    <th>Descrizione</th>
                    <th>Valutazione</th>
                    <th>Prezzo</th>
                </tr>
            </thead>
        <?php
            require "php-script\connessione.php";
            $DB=new DBAccess();
            $conn=$DB->openc();
            $P=$DB->getP();
            foreach($P as $x){
                echo "<tr>";
                echo "<td>";
                echo $x["nome"];
                echo "</td>";
                echo "<td>";
                echo $x["categoria"];
                echo "</td>";
                echo "<td>";
                echo $x["descrizione"];
                echo "</td>";
                echo "<td>";
                echo $x["Valutazione"];
                echo "</td>";
                echo "<td>";
                echo $x["prezzo"];
                echo "</td>";
                echo "</tr>";
            }
        ?>
        </table>    
    
    
    </section>
    
    
        <footer>
        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS Valido!" />
            </a>
        </p>
        
        <p> Developed by Lotto Matteo, Tassetto Riccardo, Davide Zago</p>

    </footer>
    
</body>

</html>