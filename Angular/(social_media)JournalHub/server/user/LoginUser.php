<?php
include_once "../Connection.php";
include_once "validate.php";
include_once "password.php";
LoginUser::login();
class LoginUser
{
  public static function token(){
    $keyz = "abcdefghijklmnoprstuwzxy1234567890";
    $token = "";
    for($i=0; $i<54; $i++){
      $token= $token.$keyz[rand(0,33)];
    }
    return $token;
  }


  public static function login(){
    $data = json_decode(file_get_contents("PHP://input"));

    if(!empty($data->email) && !empty($data->password))
    {
      foreach ($data as &$item) {
        $item = validate($item);
      }
      $data->password = password($data->password);
      self::getResponse($data);
    }
  }
  public static function getResponse($data){
    $query = Connection::getCon()->prepare("SELECT * FROM `users` WHERE email='$data->email'");
    try {
      $query->execute(array());
      $gotData = $query->fetchAll(PDO::FETCH_ASSOC);
      self::checkPassword($data, $gotData);
    }catch(PDOException $e){
      echo json_encode(["error"=>"no_user"]);
    }
  }

  public static function checkPassword($data, $gotData){
    if($data->password == $gotData[0]["password"]){
      $token = self::token();
      $query = Connection::getCon()->prepare("UPDATE `users` SET token = '$token' WHERE email='$data->email'");
      $query->execute();

      echo json_encode(["token"=>$token]);

    }else{
      echo json_encode(["error"=>"password_match"]);
    }
  }
}
