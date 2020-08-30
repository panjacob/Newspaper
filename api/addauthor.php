<?php
require_once('../DataBase.php');
$url = '../index.php';


if (!isset($_POST['first']))
    header("Location: $url");

$first = $_POST['first'];
$last = $_POST['last'];
$db = new DataBase();
$db->insertAuthor($first, $last);
header("Location: $url");

