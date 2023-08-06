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
        }
    }

    private function processCollectionRequest(string $method): void {
        switch ($method) {
            case "POST":
                $data = (array) json_decode(file_get_contents("php://input"), true);

                $errors = $this->getValidationErrors($data);

                if(! empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

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

    // TODO: Modify errors
    private function getValidationErrors(array $data): array {
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
                $errors[] = "email must be an integer";
            }
        }

        return $errors;
    }
}