<?php
require_once('../DataBase.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new DataBase();
    $articles = $db->getArticlesByAuthor($id);
    echo json_encode($articles);
}