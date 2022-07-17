<?php


include_once "Connection.php";
echo json_encode(GetDateNews::getAllReadableNewsFromThisMonth(), JSON_UNESCAPED_UNICODE);
class GetDateNews
{
  public static function getAllReadableNewsFromThisMonth():array
  {
    $query = Connection::getCon()->prepare("SELECT * FROM `news` WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
AND YEAR(`date`) = YEAR(CURRENT_DATE())");
    $query->execute(array());
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

}
