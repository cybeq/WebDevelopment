<?php

header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
header("Access-Control-Allow-Methods: *");



class Connection
{
    public static function getCon(): ?MySqli{
    $connection = new Mysqli("localhost","root","","mycrud");
    if($connection->connect_error){
        echo json_encode(["error"=>"connection"]);
        return null;
    }
    return $connection;

    }
}
