<?php
   

   require_once "database.php";
try {
    $conn = new PDO ("mysql:host=$host;dbname=$dbname", "$user","$pass");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    header("Access-Control-Allow-Origin = *");
header("Content-type: application/json");
header("Content-type: application/file");


    $body = file_get_contents("php://input");
    $body = json_decode($body, true); 


} catch (PDOException $e) {
    http_response_code(400);
    header("Content-type: plain/text");

    echo "connection failed".$e->getMessage();
}