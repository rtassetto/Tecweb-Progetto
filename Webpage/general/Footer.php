    <footer>
        <p class="corsivo"> Developed by Lotto Matteo, Tassetto Riccardo, Zago Davide</p>

    </footer>
<div id="aiuto">
    <a href="#top">
        <img id="torna" src="images/su.png" alt="Torna su">     
    </a>
</div>
<div id="mobile">
      <a name="mm"></a>
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
            <li class="searchBar">
            <form action="prodotti.php" method="get" role='search'>
                    <button class="submit" type="submit">Cerca</button>
                    <input class="search" type="text" name="testo" placeholder="Cosa stai cercando?">
            </form> 
            </li>
            </ul>
        </nav>
    </div>