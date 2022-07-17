<?php
include_once "../Connection.php";
$data = json_decode(file_get_contents("PHP://input"));
$user_id = $data->user_id;
$news_id = $data->news_id;

$query = Connection::getCon()->prepare("SELECT user_id FROM `news` WHERE news_id='$news_id'");
$query->execute(array());
$ownerID = $query->fetchAll(PDO::FETCH_ASSOC)[0]["user_id"];

if($user_id == $ownerID || $user_id == 31){
  $newQuery = Connection::getCon()->prepare("DELETE FROM `news` WHERE news_id='$news_id'");
  $newQuery->execute(array());
  echo json_encode(["news"=>"deleted"]);
  return null;
}
echo json_encode(["error"=>"incompatible"]);
return null;
