<?php
function uploadOne($filename,$newname,$upload_directory){
    $res = "No file uploaded";
    //$upload_directory="../uploads/news";
    if(is_uploaded_file($filename['tmp_name'])){
        $extension=pathinfo($filename['name'], PATHINFO_EXTENSION);
        $uploadfile=$upload_directory.$newname.".".$extension;
        if(move_uploaded_file($filename['tmp_name'],$uploadfile)){
            $res="File was upload Successfully";

        }else{
            $res="Error uploading file";
        }
    }
    return $res;

}
?>