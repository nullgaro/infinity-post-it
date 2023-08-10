<?php

class PostitGateway {
    private PDO $conn;

    public function __construct(Database $database) {
        $this->conn = $database->getConnection();
    }

    public function getAll(): array {
        $sql = "SELECT postits.content, postits.color, postits.publish_date, users.username as 'author' FROM postits INNER JOIN users ON postits.user_id = users.user_id";
        $stmt = $this->conn->query($sql);

        $data = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function create(array $data): string {
        $sql = "INSERT INTO postits(user_id, content, publish_date)
                VALUES (:user_id, :content, :publish_date)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":user_id", $data["user_id"] ?? 0, PDO::PARAM_INT);
        $stmt->bindValue(":content", $data["content"], PDO::PARAM_STR);
        $stmt->bindValue(":publish_date", date('Y-m-d'), PDO::PARAM_STR);

        $stmt->execute();

        return $this->conn->lastInsertID();
    }

    public function get(string $id): array | false {
        $sql = "SELECT postits.content, postits.color, postits.publish_date, users.username as 'author' FROM postits INNER JOIN users ON postits.user_id = users.user_id where postit_id = :postit_id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":postit_id", $id, PDO::PARAM_INT);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}