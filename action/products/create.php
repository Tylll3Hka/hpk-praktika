<?php

use Src\ProductsRepository;
require_once '../../vendor/autoload.php';

$title = $_POST['title'];
$price = $_POST['price'];

if (empty(trim($title)) || empty(trim($price))) header("Location: /products");

$productRepository = new ProductsRepository();
$productRepository->create($title, $price);

header("Location: /");