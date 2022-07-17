<?php
include_once "Connection.php";
$data = json_decode(file_get_contents("PHP://input"));
if($data->user_id==31){
  $query = Connection::getCon()->prepare("UPDATE `news` SET okay=1 WHERE news_id='$data->news_id'");
  $query->execute();
  echo json_encode(["success"=>"done"]);
  return null;
}
echo  json_encode(["error"=>"no_admin_privileges"]);
return null;
