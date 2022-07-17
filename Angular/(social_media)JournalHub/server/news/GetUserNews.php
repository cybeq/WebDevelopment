<?php
include_once "Connection.php";
$url_components = parse_url(htmlspecialchars(htmlentities(($_SERVER['REQUEST_URI']))));
parse_str($url_components['query'], $params);

$search_KEY = $params['id'];

GetUserNews::getNewsByUserId($search_KEY);
class GetUserNews
{

  public static function getNewsByUserId($id){
    $query = Connection::getCon()->prepare("SELECT ALL * FROM news WHERE user_id=$id");

    $query->execute(array());
    $array = $query->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($array, JSON_UNESCAPED_UNICODE);
  }
}
