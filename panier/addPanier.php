<?php
    $conn = mysqli_connect("localhost", "root", "", "ppe", 3306);
    $conn->set_charset("utf8");
    $idjeu = $_GET['idjeu'];
    $id = $_GET['id'];
            if (isset($id)) {
                    $rqt = "SELECT Count FROM panier WHERE ID_JEU = $idjeu AND ID = $id";
                    $rst = mysqli_query($conn, $rqt);
                    $myr = $rst->fetch_array();
                    if($myr["Count"] >= 1){
                        $countGames = $myr["Count"];
                        $rqt = "UPDATE panier SET Count = ($countGames + 1) WHERE ID_JEU = $idjeu AND ID = $id";
                        $rst = mysqli_query($conn, $rqt);
                    } else{
                        $rqt = "INSERT INTO panier (ID,ID_JEU,Count) VALUES ($id, $idjeu, 1)";
                        $rst = mysqli_query($conn, $rqt);
                    }
                    header("Location: ../detailled.php?id=$idjeu");

                
            } else{
                header("Location: ../connexion/login.php");
            }
?>