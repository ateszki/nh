<?php
header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');

echo $data;

$fp = fopen('./home-page-banners/banners.json', 'w');
fwrite($fp, $data);
fclose($fp);

echo json_decode($data);
