<?php
include_once "../queries/UserQueries.php";
$queries= new UserQueries();
$data= json_decode(file_get_contents("php://input"));
$received = $queries->getAllUserData($data->name);
if($received["active"]==0){
    $response["tokenStatus"] = "failure";
    echo json_encode($response);
}
else {
    $response["tokenStatus"] = "success";
    echo json_encode($response);
}
