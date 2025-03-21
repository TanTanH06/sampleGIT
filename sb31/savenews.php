<?php 
require_once("includes/dbconnect.php");



$folder="uploads/news/";
$fname=$_FILES['files'];
$id=$_POST['txtID'];
$title=$_POST['txtTitle'];
$date=$_POST['cbDate'];
$author=$_POST['txtAuthor'];
$content=$_POST['txtContent'];
$isActive=(int)$_POST['chkActive'];
if($id==0){
    $sql="INSERT INTO news(title,date_posted,author,content,isActive)VALUES(?,?,?,?,?)";
    $data=arraY($title,$date,$author,$content,$isActive);
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
}

$folder="uploads/news/";
$fname=$_FILES['files'];
$newName=$con->lastInsertedId();
$name=explode(".",$_FILES['files']['name']);
$ext=$name[1];

UploadOne($fname,$newName,$folder);
updateImage($newName,$ext);




function UploadOne($fname,$newName,$folder){ 
    $pangalan=$fname['name'];
      $ext=explode('.',$pangalan);
      if (is_uploaded_file($fname['tmp_name'])) 
      { 
        $filname = basename($fname['name']); 
        $uploadfile = $folder . $newName.".".$ext[1]; 
  
          if (move_uploaded_file ($fname['tmp_name'], $uploadfile)) 
            echo $res = "File " . $filname . " was successfully uploaded and stored.<br>"; 
          else 
            echo $res = "Could not move ".$fname['tmp_name']." to ".$uploadfile."<br>"; 
      }
      else
        $res = "File ".$fname['name']." failed to upload."; 
      
    return ($res); 
  } 




  function updateImage($id,$ext){
    $sqlupdate="UPDATE news SET image=? WHERE newsID=?";
    $data = array("{$id}.{$ext}",$id);
    $stmt=$con->prepare($sql);
    $stmt->execute($data);
    return("Success updating the record");
  }


  



?>
