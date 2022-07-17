<?php
function validate($data){
  return trim(htmlentities(htmlspecialchars(stripslashes($data))));
}

?>
