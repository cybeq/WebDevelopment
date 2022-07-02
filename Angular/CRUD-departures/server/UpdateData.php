<?php
include_once "Connection.php";
echo json_encode(UpdateData::update());

class UpdateData
{
    public static function update(){
        $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        $data = json_decode(file_get_contents("php://input"));
        Connection::getCon()->query("UPDATE departures SET airline='$data->airline',
        city='$data->city', `date`= '$data->date'
        WHERE id= $id
       ");

        return $data;
    }
}
