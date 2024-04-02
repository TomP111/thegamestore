<!DOCTYPE html>
<html>
<?php
require_once("../db.php");
require_once("header.php");
session_start();
?>

<head>
    <title>Panier</title>
    <style>
        body {
            background-color: rgb(32, 32, 32);
            color: white;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .cadre_panier {
            padding: 10px;
            margin-bottom: 10px;
            min-width: 35%;
            max-width: 50%;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .cadre_résumé {
            padding: 10px;
            width: 25%;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            height: 400px;
        }

        .resume-buttons {
            text-align: center;
            margin-top: 10px;
        }

        .orange-button {
            background-image: linear-gradient(to left, #ff2020, #ff8000);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }

        .orange-button:hover {
            background-image: linear-gradient(to bottom, #FFA500, #FF8C00);
        }

        .panier-card-img {
            width: 200px;
            height: 110px;
            border-radius: 5px;

        }

        .panier-container-games {
            display: flex;
            flex-direction: column;
            margin-bottom: 12.5px;
            margin-top: 12.5px;
        }

        .panier-container-elements {
            display: grid;
            grid-template-columns: 200px 300px 200px;
        }

        .game-name {
            font-weight: bold;
            text-wrap: balance;
        }

        .panier-container-elements-centered {
            margin-top: 15px;
            margin-left: 15px;
        }

        .panier-container-elements-quantite {
            margin-top: 15px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .panier-container-elements-plateforme {
            margin-top: 7px;
        }

        .minus {
            margin-right: 5px;
            font-size: 40px;
            text-decoration: none;
            color: white;
        }

        .plus {
            margin-left: 5px;
            font-size: 30px;
            text-decoration: none;
            color: white;
        }

        hr {
            opacity: 0.1;
        }

        #price {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-size: 17px;
        }

        #resume{
            text-align: center;
        }

        #total{
            display: flex;
            flex-direction: row;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 20px;
        }



    </style>
    <link rel="shortcut icon" type="image/png" href="../img/favicon.ico" />


    <?php
    if (!isset($_SESSION['ID']) && !isset($_SESSION['User'])) {
        header("Location: ../connexion/login.php");
    }
    ?>
</head>

<body>
    <div id="header-space"></div>
    <h1></h1>
    <div class="container">
        <div class="cadre_panier">
            <h2>Panier</h2>
            <?php
            $rqt = "SELECT * FROM panier WHERE ID = $_SESSION[ID]";
            $rst = mysqli_query($conn, $rqt);
            while ($myr = $rst->fetch_array()) {
                $rqt2 = "SELECT * FROM image WHERE ID_JEU = $myr[ID_JEU]";
                $rst2 = mysqli_query($conn, $rqt2);
                $myr2 = $rst2->fetch_array();
                $rqt2 = "SELECT * FROM articles WHERE ID_JEU = $myr[ID_JEU]";
                $rst2 = mysqli_query($conn, $rqt2);
                $myr3 = $rst2->fetch_array();
                echo '<div class="panier-container-games">';
                echo '<div class="panier-container-elements">';
                echo '<a href="../detailled.php?id=' . $myr["ID_JEU"] . '"><img class="panier-card-img" src="data:image/png;base64,' . base64_encode($myr2["Lien"]) . '" /></a>';
                echo '<div class="panier-container-elements-centered">';
                echo '<a class="game-name">' . $myr3["Nom"] . '</a>';
                echo '<div class="panier-container-elements-plateforme">';
                $rqt2 = "SELECT * FROM disponible WHERE ID_JEU = $myr[ID_JEU]";
                $rst2 = mysqli_query($conn, $rqt2);
                while ($myr4 = $rst2->fetch_array()) {
                    // Ajoute chaque ID de plateforme dans le tableau "arr"

                    $arr[] = $myr4["ID_Plateforme"];
                }
                for ($i = 0; $i < count($arr); $i++) {
                    // Récupère le nom correspondant à l'ID de chaque plateforme
                    $rqt2 = "SELECT * FROM plateforme WHERE ID_Plateforme = $arr[$i]";
                    $rst2 = mysqli_query($conn, $rqt2);
                    $myr5 = $rst2->fetch_array();
                    // Ajoute le nom au tableau "arrPlat"
                    $arrPlat[$i] = $myr5["Nom"];
                }
                $plateformes = implode(",", $arrPlat);
                echo '<a class="game-plateformes">' . $plateformes . '</a>';
                unset($arr);
                unset($arrPlat);

                echo '</div>';
                echo '<div class="panier-container-elements-quantite">';
                echo '<a class="minus" href="modifQuantite.php?i=' . $_SESSION["ID"] . '&id=' . $myr["ID_JEU"] . '&value=m">-</a>';
                $rqt2 = "SELECT * FROM panier WHERE ID_JEU = $myr[ID_JEU] AND ID = $_SESSION[ID]";
                $rst2 = mysqli_query($conn, $rqt2);
                $myr6 = $rst2->fetch_array();
                echo '<a class="quantite">' . $myr6["Count"] . '</a>';
                echo '<a class="plus" href="modifQuantite.php?i=' . $_SESSION["ID"] . '&id=' . $myr["ID_JEU"] . '&value=p">+</a>';
                echo '</div>';
                echo '</div>';
                $rqt2 = "SELECT * FROM articles WHERE ID_JEU = $myr[ID_JEU]";
                $rst2 = mysqli_query($conn, $rqt2);
                $myr6 = $rst2->fetch_array();
                echo '<span id="price">' . $myr6["Prix"] . ' €</span>';
                echo '</div>';
                echo '</div>';
                echo '<hr>';
            }

                echo '<a class="orange-button" href="delPanier?i='.$_SESSION["ID"].'">Supprimer le panier</a>'
            ?>
        </div>

        <div class="cadre_résumé">
            <h2 id="resume">Résumé</h2>
            <?php
                $rqt2 = "SELECT * FROM panier WHERE ID = $_SESSION[ID]";
                $rst2 = mysqli_query($conn, $rqt2);
                $totalprice = 0;
                while($myr6 = $rst2->fetch_array()){
                    $rqt3 = "SELECT * FROM articles WHERE ID_JEU = $myr6[ID_JEU]";
                    $rst3 = mysqli_query($conn, $rqt3);
                    $myr7 = $rst3->fetch_array();
                    $totalprice = $totalprice + ($myr7["Prix"] * $myr6["Count"]);
                }
                echo '<span id="total">'.$totalprice.' €</span>';
            ?>
            <div class="resume-buttons">
                <?php
                    echo '<a class="orange-button" href="validation_page.php?id='.$_SESSION["ID"].'">Valider la commande</a>';
                ?>
                
                <hr>
                <button class="orange-button" onclick="window.location.href='../index.php'">Continuer votre shopping</button>
            </div>
        </div>
    </div>

</body>

</html>