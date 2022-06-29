<?php
include_once ("../models/User.php");
include_once ("../queries/UserQueries.php");
include_once ("../Mailer.php");
$data = json_decode(file_get_contents("php://input"));
$user = new User($data->name,$data->password, $data->email);
$queries = new UserQueries();
$response = $queries->addUser($user);
if($response["user"]=="created"){
$mailer = new Mailer($user->getToken());

}
