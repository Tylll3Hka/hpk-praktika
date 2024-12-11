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
        return $this->pdo->query("
            SELECT p.*, sum(e.count) AS total_product FROM product AS p 
            LEFT JOIN entrance e ON e.product_id = p.id
            GROUP BY p.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne(int $id): array
    {
        return $this->pdo->query("SELECT * FROM product p WHERE p.id = $id")->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): false|\PDOStatement
    {
        return $this->pdo->query("DELETE FROM product WHERE id = $id");
    }

    public function create(mixed $title, mixed $price): bool|\PDOStatement
    {
        return $this->pdo->query("INSERT INTO product (title, price) VALUES ('$title', '$price')");
    }

    public function update(int $id, string $title, int $price): bool|\PDOStatement
    {
        return $this->pdo->query("UPDATE product SET title = '$title', price = '$price' WHERE id = $id");
    }

    public function getLastProduct()
    {
        return $this->pdo->query("SELECT id FROM product ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    }
}