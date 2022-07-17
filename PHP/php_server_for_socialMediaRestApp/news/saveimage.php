<?php
include_once "Connection.php";
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: *');
header('Access-Control-Allow-Methods: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$url_components = parse_url(htmlspecialchars(htmlentities(($_SERVER['REQUEST_URI']))));
if(!isset($url_components['query'])){
  echo json_encode(["error"=>"no_param_query"]);
  return null;
}
parse_str($url_components['query'], $params);
if(isset($_GET["id"]))
  $news_id = $_GET["id"];
else{
  echo json_encode(["error"=>"no_news_id"]);
  return null;
}

// name
$fileFormat = substr($_FILES["image"]["name"],strlen($_FILES["image"]["name"])-3,3);
$fileGeneratedName = generateName($fileFormat);

$target_dir = "uploads/";
$target_file = $target_dir . basename($fileGeneratedName);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo json_encode(["error"=>"file_not_an_image"]);
    $uploadOk = 0;
  }
if($imageFileType != "jpg" && $imageFileType != "png"
  && $imageFileType != "gif" ) {
  echo json_encode(["error"=>"jpg_png_gif"]);
  $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 900000) {
  echo json_encode(["error"=>"file_bigger_than_900kb"]);
  $uploadOk = 0;
}
if (file_exists($target_file)) {
  $fileGeneratedName = generateName($fileFormat);
  $target_file = $target_dir . basename($fileGeneratedName);
}

if($uploadOk==1){
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  echo json_encode(["succes"=>"image_uploaded"]);

  insertIntoTable($fileGeneratedName, $news_id);
}


  function generateName($fileFormat){
    $keyz = "abcdefghijklmnoprstuwzxy1234567890";
    $name = "";
    for($i=0; $i<strlen($keyz); $i++){
      $random = rand(0,33);
      $name= $name.$keyz[$random];
    }
    return $name.".".$fileFormat;
  }

function insertIntoTable($fileGeneratedName, $news_id){
  $query = Connection::getCon()->prepare("UPDATE `news` SET photo='http://localhost/angular/partyhub/server/news/uploads/$fileGeneratedName' WHERE news_id='$news_id'");
  $query->execute();
}

?>
