<?php
use Src\EntranceRepository;
require_once '../../vendor/autoload.php';

$count = $_POST['count'];
$productId = $_POST['productId'];
if (empty(trim($count))) header("Location: /entrance.php");

$entranceRepository = new EntranceRepository();
$entranceRepository->create($count, $productId);

header("Location: /entrance.php");