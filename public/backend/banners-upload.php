<?php
header("Access-Control-Allow-Origin: *");

$target_dir = "home-page-banners/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$respuesta = '';

// Check if image file is a actual image or fake image
if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    // echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $respuesta =  "El archivo ya existe";
  $uploadOk = 0;
}



// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $respuesta = "Sólo JPG, JPEG, PNG & GIF permitidos.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header("HTTP/1.1 500 Internal Server Error ".$respuesta);
  die();
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // guardo en el json
    $string = file_get_contents("home-page-banners/banners.json");
    if ($string === false) {
        header("HTTP/1.1 500 - Internal server error - json not found");
    }

    $banners = json_decode($string, true);
    if ($banners === null) {
        header("HTTP/1.1 500 - Internal server error - json invalid");
    }
    $obj = new stdClass;
    $obj->url = null;
    $obj->filename = basename($_FILES["fileToUpload"]["name"]);
    $banners[] = $obj;
    $fp = fopen('home-page-banners/banners.json', 'w');
    fwrite($fp, json_encode($banners));
    fclose($fp);
    echo "Banner creado";
  } else {
    header("HTTP/1.1 500 Internal Server Error - Ocurrió un error al guardar el archivo.");
  }
}
