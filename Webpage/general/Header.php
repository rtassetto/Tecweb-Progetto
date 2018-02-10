    <header>
        <img id="logo" src="images/logo.png" alt="Logo sito"/>        
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="prodotti.php">Prodotti</a></li>
				<?php
				if(isset($_SESSION['login_user'])){
                $isA=$_SESSION['admin'];   
                if(!$isA){
					echo '<li><a href="account.php">Account</a></li>';
				    echo '<li><a href="carrello.php">Carrello</a></li>';

                }
                else{
                    echo '<li><a href="adminmenu.php">Gestione sito</a></li>'; 
                }
                echo '<li><a href="php-script/logout.php">Logout</a></li>';
				}
				else{
				echo '<li><a href="login.php">Login</a></li>';
				}
				?>
                <li><form action="prodotti.php" method="get">
                    <button id="searchButton" type="submit">Vai</button>
                    <input id="search" type="text" name="testo" placeholder="Cosa stai cercando?"></form> 
                </li>
            </ul>
        </nav>
    </header>