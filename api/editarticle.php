<?php
require_once('../DataBase.php');
$url = '../index.php';
$id = 0;

if (!isset($_POST['id']))
    header("Location: $url");

$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];
$db = new DataBase();
$db->updateArticle($id, $title, $text);
header("Location: $url");

