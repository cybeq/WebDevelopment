<?php
include_once "../Connection.php";
$url_components = parse_url(htmlspecialchars(htmlentities(($_SERVER['REQUEST_URI']))));
parse_str($url_components['query'], $params);
$token = $_GET["token"];
$query = Connection::getCon()->prepare("SELECT * FROM `users` WHERE token='$token'");
$query->execute(array());
$array = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($array);
?>
