<?php

use Src\ProductsRepository;
require_once '../../vendor/autoload.php';

$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];

if (empty(trim($title)) || empty(trim($price)) || empty(trim($description))) header("Location: /products");

$productRepository = new ProductsRepository();
$productRepository->create($title, $description, $price, $category);

header("Location: /products");