<?php
include_once "../Connection.php";
LogoutUser::logout();
class LogoutUser
{
  public static function logout(){
    $data= json_decode(file_get_contents("PHP://input"));
    $query = Connection::getCon()->prepare(
      "UPDATE `users` SET token = '' WHERE token='$data->token'");
    $query->execute();
    echo json_encode(["success"=>"logout"]);
  }
}
