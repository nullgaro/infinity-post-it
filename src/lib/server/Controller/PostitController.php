<?php

class PostitController {
    public function __construct(private PostitGateway $gateway) {

    }

    public function processRequest(string $method, ?string $id): void {

        if ($id) {
            $this->processResourceRequest($method, $id);

        } else {
            $this->processCollectionRequest($method);
        }
    }

    private function processResourceRequest(string $method, string $id): void {
        $postit = $this->gateway->get($id);

        if(! $postit) {
            http_response_code(404);
            echo json_encode(["message" => "Post-it not found"]);
            return;
        }

        switch($method) {
            case "GET":
                echo json_encode($postit);
                break;

            default:
                http_response_code(405);
                header("Allow: GET");
        }
    }

    private function processCollectionRequest(string $method): void {
        switch ($method) {
            case "GET":
                echo json_encode($this->gateway->getAll());
                break;

            case "POST":
                $data = (array) json_decode(file_get_contents("php://input"), true);

                $errors = $this->getValidateionErrors($data);

                if(! empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $id = $this->gateway->create($data);

                http_response_code(201);
                echo json_encode([
                    "message" => "Post-it created",
                    "id" => $id
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: GET, POST");
        }
    }

    private function getValidateionErrors(array $data): array {
        $errors = [];

        if(empty($data["content"])) {
            $errors[] = "content is required";
        }

        if(array_key_exists("user_id", $data)) {
            if(filter_var($data["user_id"], FILTER_VALIDATE_INT) === false) {
                $errors[] = "user_id must be an integer";
            }
        }

        return $errors;
    }
}