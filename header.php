<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <script>
    </script>
    <div class="header-container">
        <a href="http://localhost/the_game_store/index.php"><img id="logo" src="http://localhost/the_game_store/img/logo.png"></a>
        <div class="searchBar">
            <form class="search-form" action="http://localhost/the_game_store/catalogue.php" method="get">
                <input id="searchBAR" name="search" type="text" value="<?php
                    // Va récupérer la recherche qui se trouve dans GET et la mettre dans la barre de recherche
                    if(isset($_GET['search'])){
                        echo "$_GET[search]";
                    }
                ?>" />
            </form>
        </div>
        <div class="menu">
            <a href="http://localhost/the_game_store/panier/panier.php"><img id="cart-img" src="http://localhost/the_game_store/img/cart.png"></a>
            <a href="http://localhost/the_game_store/connexion/login.php"><img id="account-img" src="http://localhost/the_game_store/img/account.png"></a>
        </div>
    </div>
</body>
</html>