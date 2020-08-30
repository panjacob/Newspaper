<?php
require_once('../DataBase.php');


if (isset($_GET['article'])) {
    $author_id = $_GET['author'];
    $article_id = $_GET['article'];
    $url = "../editarticleform.php/?id=$article_id";
    $db = new DataBase();
    $db->deleteAuthorArticle($author_id, $article_id);
    header( "Location: $url" );
}