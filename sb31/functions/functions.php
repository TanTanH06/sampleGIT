<?php
session_start();
require_once("includes/dbconnect.php");
$uname=htmlspecialchars(trim($_POST['txtUname']));
$pw=sha1(trim($_POST['txtPw']));
try {
    $sql="SELECT * FROM users WHERE userName=? && password=? && isActive=1 && isDeleted=0";
    $data=array($uname,$pw);
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
    if($stmt->rowCount()==0){
        header("location:login.php");
    }else{
        
        $row=$stmt->fetch();
        #$_SESSION['UID']=$row['userID'];
       # $_SESSION['UNAME']=$row['userName'];
       setcookie("UID",$row['userID'],time()+3600);
       setcookie("UNAME",$row['userName'],time()+3600);
        header("location:users.php");
    }
} catch (\Throwable $th) {
    //throw $th;
}
?>
