<?php
    require_once("../db.php");
    session_start();

    if(isset($_GET["i"])){
        $id = $_GET["i"];
        $rqt = "DELETE FROM panier WHERE ID = $id";
        $rst = mysqli_query($conn, $rqt);
        header("Location: panier.php");
    }


    


?>