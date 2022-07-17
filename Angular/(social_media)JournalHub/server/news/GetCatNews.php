<?php

include_once "Connection.php";
$cat = htmlspecialchars(htmlentities(urlencode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY))));
echo json_encode(GetCatNews::getReadableNewsByCategory($cat), JSON_UNESCAPED_UNICODE);
class GetCatNews
{
  public static function getReadableNewsByCategory(string $category){
    $query = Connection::getCon()->prepare("SELECT * FROM `news` WHERE category='$category';");
    $query->execute(array());
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
