    <div id="menu">
        <img id="logo" src="images/logo.png" alt="Logo sito"/>        
        <nav>
            <ul>
                <?php
                echo '<li class="voci">';if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/home.php"){echo '<a>Home</a></li>';}
                else {echo '<a href="home.php">Home</a></li>';}
                echo '<li class="voci"><a href="prodotti.php">Prodotti</a></li>';
				
                
				if(isset($_SESSION['login_user'])){
                $isA=$_SESSION['admin'];   
                if(!$isA){
					echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/Tecweb-Progetto/Webpage/account.php")'<a>Account</a></li>';
                    else{echo '<a href="account.php">Account</a></li>'; }
				    echo '<li class="voci"><a href="carrello.php">Carrello</a></li>';

                }
                else{
                    echo '<li class="voci"><a href="account.php">Account</a></li>';
                    echo '<li class="voci"><a href="adminmenu.php">Gestione sito</a></li>'; 
                }
                echo '<li class="voci"><a href="php-script/logout.php">Logout</a></li>';
				}
				else{
				echo '<li class="voci"><a href="login.php">Login</a></li>';
				echo '<li class="voci"><a href="register.php">Registrati</a></li>';
				
				}
				?>
            <!--</ul>-->
        <!--</nav>-->
            <div id="searchBar">
            <form action="prodotti.php" method="get">
                    <button id="searchButton" type="submit">Cerca</button>
                    <input id="search" type="text" name="testo" placeholder="Cosa stai cercando?">
            </form> 
            </div>
            </ul>
        </nav>
    </div>