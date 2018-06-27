<div id="top">
</div>
<div id="aiuto">
    <a href="#top">
        <img id="torna" src="images/su.png" alt="Torna su">     
    </a>
</div>
<div id="menu">
        <img id="logo" src="images/logo.png" alt="Logo sito"/>     
        <a class="area" href="#mm">
        <div class="comp">
        <div></div>
        <div></div>
        <div></div>
        </div>
        </a>
        <nav>
            <ul class="nodot">
                <?php
                echo '<li class="voci">';if($_SERVER["PHP_SELF"]=="/dzago/home.php"){echo '<a>Home</a></li>';}
                else {echo '<a href="home.php">Home</a></li>';}
                echo '<li class="voci">';
                if($_SERVER["PHP_SELF"]=="/dzago/prodotti.php"){echo '<a>Prodotti</a></li>';}
                else {echo '<a href="prodotti.php">Prodotti</a></li>';}
				
                
				if(isset($_SESSION['login_user'])){
                $isA=$_SESSION['admin'];   
                if(!$isA){
					echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/dzago/account.php"){echo '<a>Account</a></li>';}
                    else{echo '<a href="account.php">Account</a></li>'; }
				    echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/dzago/carrello.php"){echo '<a>Carrello</a></li>';}
                    else{echo '<a href="carrello.php">Carrello</a></li>';}

                }
                else{
                    echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/dzago/account.php"){echo '<a>Account</a></li>';}
                    else{echo '<a href="account.php">Account</a></li>'; }
                    echo '<li class="voci">';
                    if($_SERVER["PHP_SELF"]=="/dzago/adminmenu.php"){echo '<a>Gestione sito</a></li>';}
                    else{echo '<a href="adminmenu.php">Gestione sito</a></li>';} 
                }
                echo '<li class="voci"><a href="php-script/logout.php">Logout</a></li>';
				}
				else{
                echo '<li class="voci">';
                if($_SERVER["PHP_SELF"]=="/dzago/login.php"){echo '<a>Login</a></li>';}
                else{echo '<a href="login.php">Login</a></li>'; }
                echo '<li class="voci">';
                if($_SERVER["PHP_SELF"]=="/dzago/register.php"){echo '<a>Registrati</a></li>';}
                else{echo '<a href="register.php">Registrati</a></li>'; }
				
				
				}
				?>
            <!--</ul>-->
        <!--</nav>-->
            <li class="searchBar">
            <form action="prodotti.php" method="get">
                    <button  class="submit" type="submit">Cerca</button>
                    <input class="search" type="text" name="testo" placeholder="Cosa stai cercando?">
            </form> 
            </li>
            </ul>
        </nav>
    </div>