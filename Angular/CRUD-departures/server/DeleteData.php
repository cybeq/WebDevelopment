<?php

include_once "Connection.php";
DeleteData::delete();
class DeleteData
{
    public static function delete(){
        $id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        Connection::getCon()->query("DELETE from departures WHERE id=$id");
        echo json_encode(["deleted"=>$id]);
    }
}
