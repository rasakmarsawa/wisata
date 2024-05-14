<?php

/**
 *
 */
class imageUpload
{

  function __construct(){}

  function checkImage($data){
    $uploadOk = 1;
    $msg = "";
    $result = array();
    if ($data['foto']['error'] != 4 || ($data['foto']['size'] != 0 && $data['foto']['error'] != 0)){
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($data["foto"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($data["foto"]["tmp_name"]);
        if($check !== false) {
          $msg .= "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          $msg .= "File is not an image.";
          $uploadOk = 0;
        }
      }

      // Check if file already exists
      // if (file_exists($target_file)) {
      //   $msg .= "Sorry, file already exists.";
      //   $uploadOk = 0;
      // }

      // Check file size
      if ($data["foto"]["size"] > 50000000) {
        $msg .= "Sorry, your file is too large.".$data["foto"]["size"];
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      if ($uploadOk == 0) {
        $msg .= "Sorry, your file was not uploaded.";
      }
      $result['type']=$imageFileType;
    }else{
      $uploadOk = 0;
      $msg .= "Sorry, looks like the file is empty or not found";
    }

    $result['status']=$uploadOk;
    $result['message']=$msg;

    return $result;
  }

  function upload($data, $target_file){
    $msg = "";
    if (move_uploaded_file($data["foto"]["tmp_name"], $target_file)) {
      $msg .= "The file ". htmlspecialchars( basename( $data["foto"]["name"])). " has been uploaded.";
    } else {
      $msg .= "Sorry, there was an error uploading your file.";
    }
  }

  function delete($filename){
    $filepath = "uploads/".$filename;
    if (file_exists($filepath)) {
      unlink($filepath);
    }
  }

  function getType($filename){
    return strtolower(pathinfo($filename,PATHINFO_EXTENSION));
  }
}
?>
