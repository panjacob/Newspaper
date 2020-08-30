<?php require_once('DataBase.php'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Meczyki</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>

</head>
<body>
<?php include("menu.html") ?>
<?php
$db = new DataBase();
$articles = $db->getAllArticles();
$i = 0;
foreach ($articles as &$article) {
    if ($i % 2 == 0) echo '<div class="row">';
    echo "
    <div class='col-sm-6'>
        <div class='card'>
            <div class='card-body'>
                <h5 class='card-title'>$article->title</h5>
                <p class='card-text'>$article->text</p>
                <a href='api/deletearticle.php?id=$article->id' class='btn btn-primary'>Usuń</a>
                <a href='editarticleform.php?id=$article->id' class='btn btn-primary'>Edytuj</a>
        </div>
        </div>
    </div>";
    if ($i % 2 == 1) echo '</div>';
    $i++;
}
$db->conn->close();
?>


</body>
</html>
