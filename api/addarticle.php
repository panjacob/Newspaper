<?php
require_once('../DataBase.php');
$url = '../index.php';


if (!isset($_POST['title']))
    header("Location: $url");

$title = $_POST['title'];
$text = $_POST['text'];
$db = new DataBase();
$db->insertArticle($title, $text);
header("Location: $url");

