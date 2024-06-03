<?php
include("businesslogic/simpleLogic.php");

$param = "";
$method = "";

isset($_POST["method"]) ? $method = $_POST["method"] : false;
isset($_POST["param"]) ? $param = $_POST["param"] : false;

$logic = new SimpleLogic();
$result = $logic->handleRequest($method, $param);
if ($result == null) {
    response("POST", 400, null);
} else {
    response("POST", 200, $result);
}

function response($method, $httpStatus, $data)
{
    header('Content-Type: application/json');
    switch ($method) {
        case "POST":
            http_response_code($httpStatus);
            echo (json_encode($data));
            break;
        default:
            http_response_code(405);
            echo ("Method not supported yet!");
    }
}
