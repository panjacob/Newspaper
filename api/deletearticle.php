<?php
require_once('../DataBase.php');
$url = '../index.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new DataBase();
    $db->deleteArticle($id);
    header( "Location: $url" );
}