    <footer>
        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img class="CSS" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS Valido!" />
            </a>
        </p>
        
        <p class="corsivo"> Developed by Lotto Matteo, Tassetto Riccardo, Zago Davide</p>

    </footer>
<div name="mmenu" id="mobile">
    <a name="pls"></a>     
        <nav>
            <ul class="nodot">
                <?php
                echo '<li class="voci">';if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/home.php"){echo '<a>Home</a></li>';}
                else {echo '<a href="home.php">Home</a></li>';}
                echo '<li class="voci">';
                if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/prodotti.php"){echo '<a>Prodotti</a></li>';}
                else {echo '<a href="prodotti.php">Prodotti</a></li>';}
				
                
				if(isset($_SESSION['login_user'])){
                $isA=$_SESSION['admin'];   
                if(!$isA){
					echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/account.php"){echo '<a>Account</a></li>';}
                    else{echo '<a href="account.php">Account</a></li>'; }
				    echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/carrello.php"){echo '<a>Carrello</a></li>';}
                    else{echo '<a href="carrello.php">Carrello</a></li>';}

                }
                else{
                    echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/account.php"){echo '<a>Account</a></li>';}
                    else{echo '<a href="account.php">Account</a></li>'; }
                    echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/adminmenu.php"){echo '<a>Gestione sito</a></li>';}
                    else{echo '<a href="adminmenu.php">Gestione sito</a></li>';} 
                }
                echo '<li class="voci"><a href="php-script/logout.php">Logout</a></li>';
				}
				else{
                echo '<li class="voci">';
                if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/login.php"){echo '<a>Login</a></li>';}
                else{echo '<a href="login.php">Login</a></li>'; }
                echo '<li class="voci">';
                if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/register.php"){echo '<a>Registrati</a></li>';}
                else{echo '<a href="register.php">Registrati</a></li>'; }
				
				
				}
				?>
            <!--</ul>-->
        <!--</nav>-->
            <li id="searchBar">
            <form action="prodotti.php" method="get">
                    <button id="searchButton" type="submit">Cerca</button>
                    <input id="search" type="text" name="testo" placeholder="Cosa stai cercando?">
            </form> 
            </li>
            </ul>
        </nav>
    </div>