<?php

include_once "../Connection.php";
include_once "validate.php";
include_once "password.php";
AddUser::addNewUser();
class AddUser
{
  public static function addNewUser():void{
    $data = json_decode(file_get_contents("PHP://input"));
    foreach ($data as &$item){
      $item = validate($item);
    }
    $data->password = password($data->password);

    if(filter_var($data->email,FILTER_VALIDATE_EMAIL)){
      if(self::isPasswordEnoughSymbols($data))
        if(self::isUsernameLetters($data))
          AddUser::executeIt($data);
    }
    else {
      echo json_encode(["error" => "valid_email"]);
    }
  }

  public static function isUsernameLetters($data):bool{
    if(ctype_alpha($data->username)){
      return true;
    }else{
      echo json_encode(["error"=>"username_not_only_letters"]);
      return false;
    }
  }

  public static function isPasswordEnoughSymbols($data):bool{
    if(strlen($data->password)>5 && strlen($data->username)>5){
      return true;
    }
    echo json_encode(["error"=>"short_password_or_username"]);
    return false;
  }

  public static function executeIt($data){
    $query = Connection::getCon()->prepare("INSERT INTO `users` (email, username, password) VALUES ('$data->email', '$data->username', '$data->password');");
    try {
      $query->execute(array());
      echo json_encode(["success"=>"register"]);
    }catch(PDOException $e){
      echo json_encode(["error"=>"username_email_exists"]);
    }
  }
}
