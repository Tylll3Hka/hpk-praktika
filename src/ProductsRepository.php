<?php
namespace Src;

require_once 'dotenv.php';
use PDO;

class ProductsRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $db = $_ENV["DB_NAME"];
        $host = $_ENV["DB_HOST"];

        $dsn = "mysql:host=$host;dbname=$db";
        $this->pdo = new PDO($dsn, $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    }

    public function getAll(): array
    {
        return $this->pdo->query("SELECT * FROM product")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne(int $id): array
    {
        return $this->pdo->query("SELECT * FROM products p WHERE p.id = $id")->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): false|\PDOStatement
    {
        return $this->pdo->query("DELETE FROM products WHERE id = $id");
    }
}