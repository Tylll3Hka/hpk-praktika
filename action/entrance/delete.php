<?php
use Src\EntranceRepository;
require_once '../../vendor/autoload.php';

$id = $_GET['id'];
if (empty($_GET['id'])) header("Location: /entrance.php");

$entranceRepository = new EntranceRepository();
$entranceRepository->delete(intval($id));

header("Location: /entrance.php");
