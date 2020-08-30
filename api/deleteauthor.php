<?php
require_once('../DataBase.php');
$url = '../authorsform.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new DataBase();
    $db->deleteAuthor($id);
    header( "Location: $url" );
}