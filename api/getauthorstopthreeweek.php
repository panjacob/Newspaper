<?php
require_once('../DataBase.php');

$db = new DataBase();
$authors = $db->getAuthorsTopThreeWeek();
echo json_encode($authors);
