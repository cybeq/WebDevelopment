<?php
function password($string){
  $string = trim($string);
  $string = stripslashes($string);
  $string = htmlspecialchars($string);
  $string = hash("haval256,5",$string);
  return $string.hash("haval256,5","jaskulkatozlo");
}

?>
