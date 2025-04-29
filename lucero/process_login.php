<?php 
session_start();
require_once "includes/dbconnect.php";
require_once "includes/functions.php";

$uname=cleanText($_POST['txtUname']);
$pword=sha1($_POST['txtPword']);
try {
    $sql="SELECT * FROM users WHERE username=? and pword=?";
    $data=array($uname,$pword);
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
    $row=$stmt->fetch();
    #solution 1
    $counter=$stmt->rowCount();
    if($counter){
        $_SESSION['userID']=$row[0];
        $_SESSION['username']=$row[3];
        header("location:users.php");

    }else{
        header("location:login.php?try=1");
    }

    #solUtion 2 
    // if($row){
    //     header("location:users.php");
    // }else{
    //     header("location:login.php?try=1");
    // }
} catch (PDOException $th) {
    echo $th->geTMessage();
}



?>
