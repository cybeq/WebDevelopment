<?php
include_once("../models/User.php");
include_once("../queries/UserQueries.php");
include_once("../validators/validate.php");
$urlQuery = validate(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY));

//$data = json_decode(file_get_contents("php://input"));
$queries = new UserQueries();
echo json_encode($queries->enterToken($urlQuery));

