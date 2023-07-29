<?php

class PostitController {
    public function processRequest(string $method, ?string $id): void {

        if ($id) {
            $this->processResourceRequest($method, $id);

        } else {
            $this->processCollectionRequest($method, $id);
        }
    }

    private function processResourceRequest(string $method, string $id): void {

    }

    private function processCollectionRequest(string $method): void {
        switch ($method) {
            case "GET":
                echo json_encode(["id" => 123]);
                break;
        }
    }
}