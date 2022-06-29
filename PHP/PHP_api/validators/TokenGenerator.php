<?php

class TokenGenerator
{
public static function generate(): string
{

    $key = "ABCDEFGHIJKLMNOPRSTUW1234567890";

    for ($i = 0; $i < strlen($key); $i++) {
    $array[$i] = $key[random_int(0, 30)];
    }
    return implode($array);
}
}
