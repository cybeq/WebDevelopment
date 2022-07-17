<?php
include_once "../Connection.php";

$url_components = parse_url(htmlspecialchars(htmlentities(($_SERVER['REQUEST_URI']))));
parse_str($url_components['query'], $params);

if(isset($_GET['token'])) {
  $token = $_GET['token'];
    if($token!="") {
      $query = Connection::getCon()->prepare("SELECT email FROM `users` WHERE token='$token'");
      $query->execute(array());
      if ($query->fetchAll(PDO::FETCH_ASSOC) != null) {
        echo json_encode(["token" => "correct"]);
      } else {
        echo json_encode(["error" => "token"]);
      };
    }else{
      echo json_encode(["error"=>"token"]);
    }
}else{
  echo json_encode(["error"=>"token"]);
}
?>
