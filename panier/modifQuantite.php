<?php
    require_once("../db.php");
    $id = $_GET["i"];
    $idjeu = $_GET["id"];
    $value = $_GET["value"];

    if($value == "m"){
        $rqt = "SELECT Count FROM panier WHERE ID_JEU = $idjeu AND ID = $id";
        $rst = mysqli_query($conn, $rqt);
        $myr = $rst->fetch_array();
        $countGames = $myr["Count"];
        if($countGames > 0){
            $rqt = "UPDATE panier SET Count = (Count - 1) WHERE ID_JEU = $idjeu AND ID = $id";
            $rst = mysqli_query($conn, $rqt);
            $rqt = "SELECT Count FROM panier WHERE ID_JEU = $idjeu AND ID = $id";
            $rst = mysqli_query($conn, $rqt);
            $myr = $rst->fetch_array();
            $countGames = $myr["Count"];
            if($countGames == 0){
                $rqt = "DELETE FROM panier WHERE ID_JEU = $idjeu AND ID = $id";
                $rst = mysqli_query($conn, $rqt);
            }
        }
    }
    if($value == "p"){
        $rqt = "UPDATE panier SET Count = (Count + 1) WHERE ID_JEU = $idjeu AND ID = $id";
        $rst = mysqli_query($conn, $rqt);
    }


    header("Location: panier.php");

    




?>