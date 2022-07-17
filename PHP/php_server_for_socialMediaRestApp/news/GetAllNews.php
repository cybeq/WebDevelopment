<?php

include_once "Connection.php";
include_once "../user/GetUserDetailsForNews.php";
echo json_encode(array_reverse(GetAllNews::getAllReadableNews()), JSON_UNESCAPED_UNICODE);
class GetAllNews
{
  public static function getAllReadableNews():array
  {
    $query = Connection::getCon()->prepare("SELECT * FROM `news` WHERE okay=1;");
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
