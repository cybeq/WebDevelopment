<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
header('Access-Control-Allow-Methods: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
class Connection
{
  public static function getCon(){

    try{
      $pdo = new PDO('mysql:host=localhost;dbname=newshub;charset=UTF8','root','');
      return $pdo;
    }
    catch(PDOException $e){
      echo json_encode(["error"=>"connection"]);
      return $e;
    }
  }
}
