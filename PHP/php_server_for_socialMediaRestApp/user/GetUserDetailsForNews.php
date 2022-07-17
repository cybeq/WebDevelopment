<?php


header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

class GetUserDetailsForNews
{
  public static function getDataForNews($user_id){

    $query = Connection::getCon()->prepare("SELECT avatar, username FROM `users` WHERE user_id=$user_id");
    $query->execute(array());

    $arrayOne = $query->fetchAll(PDO::FETCH_ASSOC);


    return $arrayOne;
  }
}
