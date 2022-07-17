<?php

include_once "Connection.php";
echo json_encode(GetNews4of5::getThatShit(), JSON_UNESCAPED_UNICODE);
class GetNews4of5
{
  public static function getThatShit(){
    $query = Connection::getCon()->prepare("SELECT * FROM `news` WHERE okay=1;");
    $query->execute(array());
    $arrayOne = array_reverse($query->fetchAll(PDO::FETCH_ASSOC));
    $empty =[];
    $j=0;
    for($i=5; $i<9; $i++){
      $empty[$j] = $arrayOne[$i];
      $j++;
    }

    return  [$empty[0],$empty[1],$empty[2],$empty[3]];

  }
}
