<?php $conn = mysqli_connect("localhost", "root", "", "ppe",3306);
    $conn->set_charset("UTF8");
    
    if (!$conn) {
        echo "Connection failed!";
    }
    $dbh = new PDO('mysql:host=localhost;dbname=ppe;port=3306', 'root', '');