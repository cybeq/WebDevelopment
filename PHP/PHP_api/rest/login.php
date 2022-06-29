<?php
include_once ("../models/User.php");
include_once ("../queries/UserQueries.php");

$data = json_decode(file_get_contents("php://input"));
$queries = new UserQueries();
echo json_encode($queries->logIn($data->name, $data->password));

