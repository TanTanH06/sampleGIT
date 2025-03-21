<?php 
require_once("includes/connect.php");
$title = $_POST['txtTitle'];
$content=$_POST['txtContent'];
try {
    $sql="INSERT INTO aboutus(atitle,acontent)VALUES(?,?)";
    $data=array($title,$content);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    header("location:aboutus.php");
} catch (PDOExcemption $e) {
    echo "Error : ".$e->getMessage();
}


?>