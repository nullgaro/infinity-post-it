<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/db/$class.php";
});

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

header("Content-type: application/json; charset=UTF-8");

$parts = explode('/', $_SERVER["REQUEST_URI"]);

if ($parts[1] != "post-its") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$user = $_ENV["DB_NAME"];
$pass = $_ENV["DB_PASS"];

$database = new Database("localhost", "postit_db", "$user", "$pass");

$database -> getConnection();

$controller = new PostitController;

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);