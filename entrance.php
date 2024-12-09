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
use Src\EntranceRepository;
require_once './vendor/autoload.php';

$entranceRepository = new EntranceRepository();
$entrance = $entranceRepository->getAll();
?>
<body>
<a href="index.php">Продукты</a>
<form method="post" action="action/entrance/create.php">
    <input type="text" placeholder="Продукт">
    <input type="number" placeholder="Количество">
    <button type="submit">Создать</button>
</form>
<table>
    <tr>
        <th>Артикул</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Действие</th>
    </tr>
    <?php foreach ($entrance as $item): ?>
        <tr>
            <td><?= $item["id"] ?></td>
            <td><?= $item["product_id"] ?></td>
            <td><?= $item["count"] ?></td>
            <td><a href="action/products/delete.php?id=<?= $item["id"] ?>">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>