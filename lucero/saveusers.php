<?php 
require_once "includes/dbconnect.php";
require_once "includes/functions.php";

if(isset($_GET['delid'])){
    $delSQL="DELETE FROM users WHERE userID=?";
    $data=array($_GET['delid']);
    try {
        $stmtDel=$con->prepare($delSQL);
        $stmtDel->execute($data);
        header("location:aboutus.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}


if(isset($_POST['txtFname'])){
    $id=$_POST['txtid'];
    $fname = cleanText($_POST['txtFname']);
    $lname = cleanText($_POST['txtLname']);
    $uname = cleanText($_POST['txtUname']);
    $pw = sha1($_POST['txtPword']);
   
    try {
        if(strlen($id)==0){
            $sql="INSERT INTO users(fname,lname,username,pword)VALUES(?,?,?,?)";
            $data = array($fname,$lname,$uname,$pw);  
        }else{
            $sql="UPDATE aboutus SET fname=?,lname=?,username=?,pword=? WHERE userID=?";
            $data = array($fname,$lname,$uname,$pw,$id);
        }
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        header("location:users.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}


?>