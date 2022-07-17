<?php

include_once "Connection.php";
include_once "../user/GetUserDetailsForNews.php";
echo json_encode(GetNewsId::getNewsById());
class GetNewsId
{
  public static function getNewsById()
  {
    $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    $query = Connection::getCon()->prepare("SELECT * FROM `news` WHERE news_id='$id';");
    $query->execute(array());
    $arrayOne = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($arrayOne as &$single){
      foreach(array_keys($single) as $key){
        if($key=="user_id"){

          $arrayWithAvatar = GetUserDetailsForNews::getDataForNews($single[$key])[0];
          $single = array_merge($single,$arrayWithAvatar);

        }
      }
    }

    return $arrayOne;
  }
}
