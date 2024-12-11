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
$products = $productsRepository->getAll();
?>
<body>
<a href="entrance.php">Поставки</a>
<form method="post" action="action/products/create.php">
    <input type="text" name="title" placeholder="Название">
    <input type="number" name="price" placeholder="Цена">
    <button id="create" type="submit">Создать</button>
</form>
<table>
    <tr>
        <th>Артикул</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
        <th colspan="2">Действие</th>
    </tr>
    <?php foreach ($products as $item): ?>
        <tr>
            <td><?= $item["id"] ?></td>
            <td><?= $item["title"] ?></td>
            <td><?= $item["price"] ?></td>
            <td><?= $item["total_product"] ?></td>
            <td><a href="action/products/delete.php?id=<?= $item["id"] ?>">Удалить</a></td>
            <td><a href="update-product.php?id=<?= $item["id"] ?>">Изменить</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>