<?php 
$host="localhost";
$dbname="dbherras";
$user="root";
$password="";
$dsn="mysql:host={$host};dbname={$dbname}";

try {
    $con = new PDO($dsn,$user,$password);
    if($con){
        echo "CONNECTED TO MYSQL DATABASE";
    }
} catch (PDOException $e) {
    echo "Connection Error : ".$e->getMessage();
}



?>