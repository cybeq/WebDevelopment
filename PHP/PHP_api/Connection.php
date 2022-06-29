<?php


class Connection
{

    public static function getCon(): ?Mysqli{

        try {
            $conn = new Mysqli("localhost", "root", "", "partyking");
            $response["connection"] = "succeed";
            echo json_encode($response);
            return $conn;
        }catch(mysqli_sql_exception $e){
            $response["connection"] = "failed";
            echo json_encode("$response");
        }
        return null;

}

}
