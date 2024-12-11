<?php
namespace Src;

require_once 'dotenv.php';
use PDO;
class EntranceRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $db = $_ENV["DB_NAME"];
        $host = $_ENV["DB_HOST"];

        $dsn = "mysql:host=$host;dbname=$db";
        $this->pdo = new PDO($dsn, $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    }

    function getAll(): false|array
    {
        return $this->pdo->query("SELECT * FROM entrance")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): false|\PDOStatement
    {
        return $this->pdo->query("DELETE FROM entrance WHERE id=$id");
    }

    public function getOne(int $id): false|array
    {
        return $this->pdo->query("SELECT * FROM entrance WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public function create(int $count, int $productId): bool|\PDOStatement
    {
        return $this->pdo->query("INSERT INTO entrance (count, product_id) VALUES ('$count', $productId)");
    }
}