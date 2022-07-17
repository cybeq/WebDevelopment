<?php
include_once "Connection.php";

$query = Connection::getCon()->prepare("SELECT * FROM `news` WHERE okay=1");
$query->execute(array());
$array = array_reverse($query->fetchAll(PDO::FETCH_ASSOC));
$empty = [];
$j=0;

for($i=9; $i<14; $i++){
  $empty[$j] = $array[$i];
  $j++;
}
echo json_encode($empty);
