<?php 
require_once "includes/dbconnect.php";

if(isset($_GET['delid'])){
    $delSQL="DELETE FROM aboutus WHERE aboutid=?";
    $data=array($_GET['delid']);
    try {
        $stmtDel=$con->prepare($delSQL);
        $stmtDel->execute($data);
        header("location:aboutus.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}


if(isset($_POST['txtTitle'])){
    $id=$_POST['txtid'];
    $title = htmlspecialchars(trim($_POST['txtTitle']));
    $content = trim($_POST['txtContent']);
    $content = filter_var($content,FILTER_SANITIZE_STRING);
    try {
        if($id==0){
            $sql="INSERT INTO aboutus(atitle,acontent)VALUES(?,?)";
            $data = array($title,$content);  
        }else{
            $sql="UPDATE aboutus SET atitle=?,acontent=? WHERE aboutid=?";
            $data = array($title,$content,$id); 
        }
        $stmt=$con->prepare($sql);
        $stmt->execute($data);
        header("location:aboutus.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}


?>