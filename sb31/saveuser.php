<?php 
   session_start();
   require_once("includes/dbconnect.php");
   if(!(isset($_COOKIE['UID']))){
       header("location:login.php");
   }

if(isset($_GET['delid'])){
    $sql="DELETE FROM users WHERE userID=?";
    $data=array($_GET['delid']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
    header("location:users.php");
}else{
    try {
        $id=$_POST['txtID'];
    $uname = htmlspecialchars(trim($_POST['txtUname']));
    $pw=sha1(trim($_POST['txtpw']));
    if(isset($_POST['chkActive'])){
        $isActive=1;
    }else{
        $isActive=0;
    }
        if($id==0){
            $sql="INSERT INTO users(userName,password,isActive)VALUES(?,?,?)";
            $data=array($uname,$pw,$isActive);   
        }else{
            $sql="UPDATE users SET userName=?,password=?,isActive=? WHERE userID=?";
            $data=array($uname,$pw,$isActive,$id);    
        }
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        header("location:users.php");
    } catch (PDOExcemption $e) {
        echo "Error : ".$e->getMessage();
    }
}



?>