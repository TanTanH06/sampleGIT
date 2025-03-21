<?php 
require_once("includes/dbconnect.php");

if(isset($_GET['delid'])){
    $delid=(int)$_GET['delid'];
    $sql="DELETE FROM aboutus WHERE id=?";
    $data=array($delid);
}else{
    $id=(int)$_POST['txtID'];
    $atitle=$_POST['txtTitle'];
    $acontent=$_POST['txtContent'];
    if($id==0){
        $sql="INSERT INTO aboutus(atitle,acontent)VALUES(?,?)";
        $data=array($atitle,$acontent);
    }else{
        $sql="UPDATE aboutus SET atitle=?,acontent=? WHERE id=?";
        $data=array($atitle,$acontent,$id);
    }      
}
try {
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
    header("location:aboutus.php");
} catch (PDOException $th) {
    echo "ERROR : ".$th->getMessage();
}

?>