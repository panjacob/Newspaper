<?php
require_once('DataBase.php');

$url = '../index.php';
if (!isset($_GET['id']))
    header("Location: $url");

$id = $_GET['id'];
$db = new DataBase();
$article = $db->getArticleById($id);
$title = $article['title'];
$text = $article['text'];
$authors = $db->getAuthorsByArticle($id);
$notauthors = $db->getNotAuthorsOfArticle($id);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
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

<form action="api/editarticle.php" method="post">
    <?php echo "<input type='hidden' id='id' name='id' value='$id'>"; ?>
    <label for="title">Title </label><br>
    <?php echo "<textarea id='title' name='title' rows='1' cols='100'>$title</textarea> <br>"; ?>
    <label for="text">Text </label><br>
    <?php echo "<textarea id='text' name='text' rows='10' cols='100'>$text</textarea> <br> "; ?>
    <input type="submit" value="Apply">
</form>
<ul>
    <?php
    if (sizeof($authors) < 1) echo "<li>artykuł anonimowy!</li>";
    else
        foreach ($authors as $author)
            echo "<li>$author->first $author->last <a href='api/deleteauthorarticle.php?author=$author->id&article=$id'>usuń</a> </li>";
    ?>
</ul>

<form action="api/addauthorarticle.php" method="GET">
    <?php echo "<input type='hidden' id='article' name='article' value='$id'>";?>
    <label for="cars">Dodaj autora</label>
    <select id="author" name="author">
        <?php
        foreach ($notauthors as $notauthor)
            echo "<option value='$notauthor->id'>$notauthor->first $notauthor->last</option>"
        ?>
    </select>
    <input type="submit" value="dodaj">
</form>

</body>
</html>