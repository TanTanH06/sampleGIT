<?php 

function uploadOne($filename,$newname,$upload_directory){
    //
    if(is_uploaded_file($filename['tmp_name'])){
        $fname=basename($filename['name']);
        $uploadfile=$upload_directory.$newname.".".end(explode(".",$filename['name']));
        if(move_uploaded_file($filename['tmp_name'],$uploadfile)){
            $res="File was uploaded Successfully";
        }else{
            $res="Error uploading file";
        }
    }
    return $res;

}

function cleanText($str){
    $strClean=trim($str);
    $strClean=htmlspecialchars($strClean);
    return $strClean;
}

?>