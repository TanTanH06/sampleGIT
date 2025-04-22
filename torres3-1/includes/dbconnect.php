<?php
$host="localhost";
$dbase="dbtorres";
$username="root";
$password="";
$dsn="mysql:host={host};dbname={dbase}";
$dsn="mysql:host=localhost;dbname=dbtorres";
try{
    $con=new PDO($dsn,$username,$password);
    if($con){
        echo "Connection Successful";
}
}catch (PDOException $th){
    echo "Error : ".$th->getMessage();
}

?>