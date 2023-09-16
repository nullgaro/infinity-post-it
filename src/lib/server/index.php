<?php

declare(strict_types=1);

// Work around: Import manually
require __DIR__ . "/Controller/PostitController.php";
require __DIR__ . "/Controller/UserController.php";
require __DIR__ . "/db/Database.php";
require __DIR__ . "/Exceptions/ErrorHandler.php";
require __DIR__ . "/Gateway/PostitGateway.php";
require __DIR__ . "/Gateway/UserGateway.php";

if(!isset($_SESSION)) {
    session_start();
}

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: http://localhost:5173');
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin, Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, X-CSRF-Token");

// TODO: Make SPL work with several directories
// spl_autoload_register(function ($class) {
//     require __DIR__ . "/db/$class.php";
//     // require __DIR__ . "/Exceptions/$class.php";
//     require __DIR__ . "/Gateway/$class.php";
//     require __DIR__ . "/Controller/$class.php";
// });

// Dotenv
require '../../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../..");
$dotenv->load();

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");


$parts = explode('/', $_SERVER["REQUEST_URI"]);

$id = $parts[2] ?? null;

$host = $_ENV["DB_HOST"];
$db = $_ENV["DB_DATABASE"];
$user = $_ENV["DB_NAME"];
$pass = $_ENV["DB_PASS"];

$database = new Database("$host", "$db", "$user", "$pass");

// Add a handler for OPTIONS method to prevent CORS error
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    http_response_code(200);
    exit;
}

switch($parts[1]) {
    case "post-its":
        $gateway = new PostitGateway($database);

        $controller = new PostitController($gateway);

        $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);

        break;

    case "users":
        $gateway = new UserGateway($database);

        $controller = new UserController($gateway);

        $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
        break;

    case "login":
        $gateway = new UserGateway($database);

        $controller = new UserController($gateway);

        $controller->login($_SERVER["REQUEST_METHOD"]);
        break;

    case "init":
        $gateway = new UserGateway($database);

        $controller = new UserController($gateway);

        $controller->init($_SERVER["REQUEST_METHOD"]);
        break;

    default:
        http_response_code(404);
        exit;
}