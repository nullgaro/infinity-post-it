<?php

class UserGateway {
    private PDO $conn;

    public function __construct(Database $database) {
        $this->conn = $database->getConnection();
    }

    public function getAll(): array {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);

        $data = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function create(array $data): string {
        $sql = "INSERT INTO users(username, password, creation_date, email, verified, vip)
                VALUES (:username, :password, :creation_date, :email, :verified, :vip)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":username", $data["username"] ?? 0, PDO::PARAM_INT);
        $stmt->bindValue(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindValue(":creation_date", date('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindValue(":verified", false, PDO::PARAM_BOOL);
        $stmt->bindValue(":vip", false, PDO::PARAM_BOOL);

        $stmt->execute();

        return $this->conn->lastInsertID();
    }

    public function get(string $id): array | false {
        $sql = "SELECT * FROM users where user_id = :user_id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":user_id", $id, PDO::PARAM_INT);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function checkIfExistsEmail(string $email): bool {
        $sql = "SELECT * FROM users where email = :email";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":email", $email, PDO::PARAM_STR);

        $stmt->execute();

        $exists = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($exists) ? true : false;
    }

    public function checkIfExistsUsername(string $username): bool {
        $sql = "SELECT * FROM users where username = :username";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":username", $username, PDO::PARAM_STR);

        $stmt->execute();

        $exists = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($exists) ? true : false;
    }

    public function checkIfPasswordIsCorrect(string $username, string $password): bool {
        $sql = "SELECT password FROM users where username = :username";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":username", $username, PDO::PARAM_STR);

        $stmt->execute();

        $db_password = $stmt->fetch(PDO::FETCH_ASSOC);

        return password_verify($password, $db_password["password"]);
    }
}