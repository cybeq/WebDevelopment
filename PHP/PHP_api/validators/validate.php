<?php
function validate(string $string): string{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}
function passwordValidate(string $string): string
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    $string = hash("haval256,5",$string);
    return $string.hash("haval256,5","jaskulkatozlo");
}
function checkEmail(string $string){
    $sanitized_email = filter_var($string, FILTER_SANITIZE_EMAIL);
    if(filter_var($sanitized_email, FILTER_VALIDATE_EMAIL))
    return $string;

    $response["error"]="wrong_email";
    echo json_encode($response);
    return $response;
}
?>
