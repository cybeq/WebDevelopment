
<?php

include_once "Connection.php";

$url_components = parse_url(htmlspecialchars(htmlentities(($_SERVER['REQUEST_URI']))));
parse_str($url_components['query'], $params);

$search_KEY = $params['search'];
//echo json_encode($_GET['play']);


$search_KEY = strval($search_KEY);
$search_KEY = str_replace("+"," ", $search_KEY);

GetContentNews::getReadableNewsBySearched($search_KEY);
class GetContentNews
{
  public static function getReadableNewsBySearched(string $search_KEY){
    $query = Connection::getCon()->prepare("SELECT ALL * FROM news WHERE CONVERT(title USING utf8)  LIKE CONVERT('%$search_KEY%' USING utf8) OR CONVERT(content USING utf8) LIKE '%$search_KEY%' ;");

    $query->execute(array());
    $array = $query->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($array, JSON_UNESCAPED_UNICODE);


  }
}
