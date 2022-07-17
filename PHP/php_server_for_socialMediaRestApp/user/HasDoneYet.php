<?php
include_once "../Connection.php";
$url_components = parse_url(htmlspecialchars(htmlentities(($_SERVER['REQUEST_URI']))));
parse_str($url_components['query'], $params);
$user_id = $_GET['id'];

$query = Connection::getCon()->prepare("SELECT * FROM `news` WHERE user_id='$user_id' AND okay=0;");
$query->execute(array());
$arrayOne = $query->fetchAll(PDO::FETCH_ASSOC);
if($arrayOne==null){
  echo json_encode(["response"=>"okay"]);
}
else{
  echo json_encode(["response"=>"wrong"]);
}

