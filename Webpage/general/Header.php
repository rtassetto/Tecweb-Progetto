    <header>
        <img id="logo" src="images/Capcom_logo.png" alt="Logo sito"/>        
        <nav>
            <ul>
                <li><a class="current" href="home.php">Home</a></li>
                <li><a href="chi_siamo.php">Chi siamo</a></li>
                <li><a href="prodotti.php">Prodotti</a></li>
				<?php
				if(isset($_SESSION['login_user'])){
				echo '<li><a href="carrello.php">Carrello</a></li>';
                echo '<li><a href="purchasehistory.php">Purchase History</a></li>';
                echo '<li><a href="php-script/logout.php">Logout</a></li>';
				}
				else{
				echo '<li><a href="login.php">Login</a></li>';
				}
				?>
                <li><form action="prodotti.php" method="get">
                    <button id="searchButton" type="submit">Go</button>
                    <input id="search" type="text" name="testo" placeholder="Cerca..."></form> 
                </li>
            </ul>
        </nav>
    </header>