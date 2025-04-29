<?php 
require_once "includes/dbconnect.php";
require_once "includes/functions.php";

If(isset($_POST['txtTitle'])){
    $extName="";
    $title="";
    $id=$_POST['txtid'];
    $title=cleanText($_POST['txtTitle']);
    $date=$_POST['dtDate'];
    $author=cleanText($_POST['txtAuthor']);
    $story=cleanText($_POST['txtStory']);
    if($id==0){ //if id=0 therefore you are adding a new record 
        $sql="INSERT INTO news(title,date_posted,author,content)VALUES(?,?,?,?)";
        $data=array($title,$date,$author,$story);
    }else{
        $sql="UPDATE news SET title=?,date_posted=?,author=?,content=? WHERE md5(newsID)=?";
        $data=array($title,$date,$author,$story,$id);
    }
    $stmt=$con->prepare($sql);
    $stmt->execute($data);

    if($id==0){
        $newName=$con->lastInsertId();
    }else{
        $sqlPic="SELECT newsID FROM news WHERE md5(newsID)=?";
        $dataPic=array($id);
        $stmtpic=$con->prepare($sqlPic);
        $stmtpic->execute($dataPic);
        $rowPic=$stmtpic->fetch();
        $newName=$rowPic[0];
    }
    
    $filename=$_FILES['picture'];
    if(!(empty($filename['name']))){
        $upload_directory="uploads/news/";
        uploadOne($filename,$newName,$upload_directory);
    }
    
    //updatiNg image field in table 
    $sqlUpdate="UPDATE news SET image=? WHERE newsID=?";
    $extName=end(explode(".",$filename['name']));
    $filename="{$newName}.{$extName}";
    $dataUpdate=array($filename,$newName);
    $stmpUpdate=$con->prepare($sqlUpdate);
    $stmpUpdate->execute($dataUpdate);



    header("location:news.php");
}



?>