<?php 
$host="localhost";
$dbase="dblucero";
$uname="root";
$pw="";
$dsn="mysql:host={$host};dbname={$dbase}";
try {
    $con = new PDO($dsn,$uname,$pw);
    if($con){
        //echo "Successfully connected to database";
    }
} catch (PDOException $err) {
    echo $err->getMessage();
}



?>