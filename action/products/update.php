<?php
use Src\ProductsRepository;
require_once '../../vendor/autoload.php';

$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
if (empty(trim($title)) || empty(trim($price))) header("Location: /");

$productRepository = new ProductsRepository();
$productRepository->update($id, $title, $price);

header("Location: /");