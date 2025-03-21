<?php 
$host="localhost";
$db="dblucero";
$uname="handrix";
$pw="lucero";
$dsn="mysql:host={$host};dbname={$db}";
try {
    $con = new PDO($dsn,$uname,$pw);
    if($con){
       // echo "Connected to Database!!!";
    }
} catch (PDOException $e) {
    echo "Error : ".$e->getMessage();
}

    

?>