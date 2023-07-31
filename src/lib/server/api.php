<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/db/$class.php";
    require __DIR__ . "/Exceptions/$class.php";
    require __DIR__ . "/Gateway/$class.php";
    require __DIR__ . "/Controller/$class.php";
});

// Dotenv
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

$parts = explode('/', $_SERVER["REQUEST_URI"]);

if ($parts[1] != "post-its") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$host = $_ENV["DB_HOST"];
$db = $_ENV["DB_DATABASE"];
$user = $_ENV["DB_NAME"];
$pass = $_ENV["DB_PASS"];

$database = new Database("$host", "$db", "$user", "$pass");

$gateway = new PostitGateway($database);

$controller = new PostitController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);