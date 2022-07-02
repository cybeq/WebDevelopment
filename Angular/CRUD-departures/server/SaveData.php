<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
header("Access-Control-Allow-Methods: *");

include_once "Connection.php";
echo json_encode(SaveData::saveData());
class SaveData
{
    public static function saveData(){
    $data = json_decode(file_get_contents("php://input"));
    try {
        Connection::getCon()->query("INSERT INTO departures (`airline`, city, `date`)VALUES ('$data->airline', '$data->city', '$data->date')");
    }catch(mysqli_sql_exception $m){
        echo $m;
    }
    return $data;
    }
}
