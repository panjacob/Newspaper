<?php
require_once('../DataBase.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new DataBase();
    $article = $db->getArticleById($id);
    echo json_encode($article);
}