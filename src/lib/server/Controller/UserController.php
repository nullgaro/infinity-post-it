<?php

class UserController {
    public function __construct(private UserGateway $gateway) {

    }

    public function processRequest(string $method, ?string $id): void {

        if ($id) {
            $this->processResourceRequest($method, $id);

        } else {
            $this->processCollectionRequest($method);
        }
    }

    private function processResourceRequest(string $method, string $id): void {
        $user = $this->gateway->get($id);

        if(! $user) {
            http_response_code(404);
            echo json_encode(["message" => "User not found"]);
            return;
        }

        switch($method) {
            case "GET":
                echo json_encode($user);
                break;

            default:
                http_response_code(405);
                header("Allow: GET");
        }
    }

    private function processCollectionRequest(string $method): void {
        switch ($method) {
            case "POST":
                $data = (array) json_decode(file_get_contents("php://input"), true);

                $errors = $this->getRegisterErrors($data);

                if(! empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $data["username"] = filter_var($data["username"], FILTER_SANITIZE_SPECIAL_CHARS);
                $data["email"] = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
                $data["password"] = filter_var($data["password"], FILTER_SANITIZE_SPECIAL_CHARS);

                $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

                $id = $this->gateway->create($data);

                http_response_code(201);
                echo json_encode([
                    "message" => "User created",
                    "id" => $id
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: POST");
        }
    }

    private function getRegisterErrors(array $data): array {
        $errors = [];

        if(empty($data["username"])) {
            $errors[] = "username is required";
        }

        if(empty($data["password"])) {
            $errors[] = "password is required";
        }

        if(empty($data["email"])) {
            $errors[] = "email is required";
        }

        if(array_key_exists("email", $data)) {
            if(filter_var($data["email"], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = "Not valid email";
            }

            if($this->gateway->checkIfExistsEmail($data["email"])) {
                $errors[] = "This email is already registered";
            }
        }

        if(array_key_exists("username", $data)) {
            if($this->gateway->checkIfExistsUsername($data["username"])) {
                $errors[] = "This username is already registered";
            }
        }

        if(array_key_exists("password", $data)) {
            if(! $this->validatePasswordSecurity($data["password"])) {
                $errors[] = "This password doesn't follow the security standards";
            }
        }

        return $errors;
    }

    private function validatePasswordSecurity(string $password): bool {
        if (strlen($password) < 8){
            return false;
        }

        if (! preg_match('/[\'`´º\/ª\\\·"^£$%&ç*(){}\[\]@#~¿?¡!<>.,:;|=_+¬-]/', $password)){
            return false;
        }

        if (! preg_match('~[0-9]+~', $password)){
            return false;
        }

        if (! preg_match('/[A-Z]/', $password)){
            return false;
        }

        if (! preg_match('/[a-z]/', $password)){
            return false;
        }

        return true;
    }
}