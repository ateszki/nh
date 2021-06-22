<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
$string = file_get_contents("home-page-banners/banners.json");
if ($string === false) {
    header("HTTP/1.1 500 - Internal server error - json not found");
}

echo $string;
