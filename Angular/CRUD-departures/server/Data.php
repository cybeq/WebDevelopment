<?php
header('Access-Control-Allow-Origin: *');
include_once "Connection.php";
echo json_encode(Data::getData());
class Data
{
    public static function getData(): array
    {
        $result = Connection::getCon()->query("SELECT * FROM `departures`");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
