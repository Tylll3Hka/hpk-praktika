<?php

use Src\ProductsRepository;
require_once '../../vendor/autoload.php';

$id = $_GET['id'];

if (empty($_GET['id'])) header("Location: /products");

$productsRepository = new ProductsRepository();
$productsRepository->delete(intval($id));

header("Location: /products");
