<?php
include_once "../Connection.php";

$url_components = parse_url(htmlspecialchars(htmlentities(($_SERVER['REQUEST_URI']))));
parse_str($url_components['query'], $params);

if(isset($_GET['token'])) {
  $token = $_GET['token'];
  if($token!="") {
    $query = Connection::getCon()->prepare("SELECT user_id FROM `users` WHERE token='$token'");
    $query->execute(array());

      echo json_encode($query->fetchAll(PDO::FETCH_ASSOC) );

  }else{
    echo json_encode(["error"=>"token"]);
  }
}else{
  echo json_encode(["error"=>"token"]);
}
