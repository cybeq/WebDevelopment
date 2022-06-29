<?php
include_once "../Connection.php";
include_once "../models/User.php";
include_once "../validators/validate.php";
//testing

//endtesting
class UserQueries
{

    function __construct(){}

    //pobranie wszystkich informacji dla wybranego usera
    function getAllUserData(string $username):?array{
       $fetch = mysqli_fetch_assoc(Connection::getCon()->query("SELECT * FROM users WHERE name = '$username'"));
        if($fetch==null){
            $response["error"] = "no_user";
            echo json_encode($response);
            return $response;
        }
       return $fetch;
    }
    //pobranie wybranej(pojedynczej) informacji dla wybranego usera
    function getSingleUserData(string $username, string $wanted):array{
        try {
            $fetch = mysqli_fetch_assoc(Connection::getCon()->query("SELECT $wanted FROM users WHERE name = '$username'"));
        }catch(mysqli_sql_exception $m){
            $response["error"] = "mysqli";
            return $response;
        }
        if($fetch==null){
            $response["error"] = "no_user";
            return $response;
        }
        return $fetch;
    }
    //dodanie nowego uzytkownika
    function addUser(User $user): ?array{
        try {
            Connection::getCon()->query("INSERT INTO users (name, email, password, token) VALUES ('{$user->getName()}', '{$user->getEmail()}', '{$user->getPassword()}', '{$user->getToken()}')");
        }catch(mysqli_sql_exception $m){
            if($m->getCode()==1146){
                $response["error"] = "mysqli_no_table";
                echo json_encode($response);
                return $response;
            }
            if($m->getCode()==1062){
                $response["error"] = "data_exists";
                echo json_encode($response);
                return $response;
            }
            echo $m->getCode();
        }
        $response["user"] = "created";
        echo json_encode($response);
        return $response;
    }
    //potwierdzenie tokena
    function enterToken(string $token): ?array{
        $username = mysqli_fetch_assoc(Connection::getCon()->query("SELECT `name` FROM users WHERE token='$token'"))["name"];
        if($username==null){
            $response["error"] = "invalid_token";
            echo json_encode($response);
            return null;
        }
        $sqlToken = $this->getSingleUserData($username,"token")["token"];
        if($sqlToken == $token){
            Connection::getCon()->query("UPDATE users SET active=1 WHERE name='$username'");
            $response["token"] = "activated";
            return $response;
        }
        $response["token"] = "wrong";
        return $response;
    }

    //logowanie- zwrocenie wszystkich danych
    function logIn(string $username, string $password): ?array{
        $sqlPassword = $this->getSingleUserData($username,"password")["password"];
        if($sqlPassword == passwordValidate($password) ){
            $response = $this->getAllUserData($username);
            $response["status"] = "logged_in";
            return $response;
        }
        $response["status"] = "error";
        return $response;
    }


}
