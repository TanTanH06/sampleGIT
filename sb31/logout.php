<?php
session_start();
session_destroy();
setcookie("UID",$row['userID'],time()-3600);
setcookie("UNAME",$row['userName'],time()-3600);
 header("location:login.php");

?>