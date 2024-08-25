<?php

require_once '../src/ResponseHandler.php';

// Set headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER['REQUEST_METHOD'];

// Instantiate the handler
$handler = new ResponseHandler();

if ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    echo json_encode($handler->handlePostRequest($data));
} elseif ($method == 'GET') {
    echo json_encode($handler->handleGetRequest());
} else {
    http_response_code(405);
    echo json_encode(["message" => "Method Not Allowed"]);
}

?>

