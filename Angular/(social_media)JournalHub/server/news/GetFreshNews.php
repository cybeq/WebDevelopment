<?php

include_once "Connection.php";
echo json_encode(GetFreshNews::getThatShit(), JSON_UNESCAPED_UNICODE);
class GetFreshNews
{
  public static function getThatShit(){
    $query = Connection::getCon()->prepare("SELECT * FROM `news` WHERE okay=1;");
    $query->execute(array());
    $arrayOne = array_reverse($query->fetchAll(PDO::FETCH_ASSOC));
    $empty =[];
    $j=0;
    for($i=0; $i<5; $i++){
      $empty[$j] = $arrayOne[$i];
      $j++;
    }
    return $empty;

  }
}
