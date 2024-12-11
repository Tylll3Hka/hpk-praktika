<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товары</title>
</head>
<?php
use Src\ProductsRepository;
require_once './vendor/autoload.php';

$productsRepository = new ProductsRepository();
$products = $productsRepository->getOne($_GET['id']);
?>
<body>
<a href="/">Отмена</a>
<form method="post" action="action/products/update.php">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <input type="text" name="title" value="<?= $products['title'] ?>" placeholder="Название">
    <input type="number" name="price" value="<?= $products['price'] ?>" placeholder="Цена">
    <button type="submit">Изменить</button>
</form>
</body>
</html>