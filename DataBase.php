<?php
require_once('Article.php');
require_once('Author.php');

class DataBase
{
    public $conn;
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'meczyki';

    function __construct()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);

        $this->conn = $conn;
    }

    function executeQuery($query)
    {
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
            return false;
        }
    }

    function insertAuthorArticle($author_id, $article_id)
    {
        $query = "INSERT INTO author_article (author_id, article_id) VALUES ('$author_id', '$article_id')";
        return $this->executeQuery($query);
    }


    function insertArticle($title, $text)
    {
        $query = "INSERT INTO article (title, text) VALUES ('$title', '$text')";
        return $this->executeQuery($query);
    }


    function insertAuthor($first, $last)
    {
        $query = "INSERT INTO author (first, last) VALUES ('$first', '$last')";
        return $this->executeQuery($query);
    }

    function deleteArticle($id)
    {
        $query = "DELETE FROM author_article where article_id = $id";
        $query2 = "DELETE FROM article WHERE id = $id";
        return ($this->executeQuery($query) && $this->executeQuery($query2));
    }

    function deleteAuthor($id)
    {
        $query = "DELETE FROM author_article where author_id = $id";
        $query2 = "DELETE FROM author WHERE id = $id";
        return ($this->executeQuery($query) && $this->executeQuery($query2));
    }

    function deleteAuthorArticle($author_id, $article_id)
    {
        $query = "DELETE FROM author_article WHERE author_id = $author_id AND article_id = $article_id";
        return $this->executeQuery($query);
    }

    function updateAuthor($id, $first, $last)
    {
        $query = "UPDATE author SET first = '$first', last = '$last' WHERE id = $id";
        return $this->executeQuery($query);
    }

    function updateArticle($id, $title, $text)
    {
        $query = "UPDATE article SET title = '$title', text = '$text' WHERE id = $id";
        return $this->executeQuery($query);
    }

    function getArticleById($id)
    {
        $query = "SELECT * FROM article WHERE id = $id";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row;
    }

    function getAllArticles()
    {
        $articles = [];
        $query = "SELECT * FROM article";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0)
            while ($row = $result->fetch_assoc())
                $articles[] = new Article($row['id'], $row['title'], $row['text']);

        return $articles;
    }

    function getAllAuthors()
    {
        $authors = [];
        $query = "SELECT * FROM author";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0)
            while ($row = $result->fetch_assoc())
                $authors[] = new Author($row['id'], $row['first'], $row['last']);

        return $authors;
    }

    function getArticlesByAuthor($author_id)
    {
        $articles = [];
        $query = "SELECT * FROM `article` WHERE id IN (SELECT article_id FROM author_article WHERE author_id = $author_id)";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0)
            while ($row = $result->fetch_assoc())
                $articles[] = $row;

        return $articles;
    }

    function getAuthorsByArticle($article_id)
    {
        $authors = [];
        $query = "SELECT * FROM `author` WHERE id IN (SELECT author_id FROM author_article WHERE article_id = $article_id)";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0)
            while ($row = $result->fetch_assoc())
                $authors[] = new Author($row['id'], $row['first'], $row['last']);

        return $authors;
    }

    function getNotAuthorsOfArticle($article_id)
    {
        $authors = [];
        $query = "SELECT * FROM `author` WHERE id NOT IN (SELECT author_id FROM author_article WHERE article_id = $article_id)";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0)
            while ($row = $result->fetch_assoc())
                $authors[] = new Author($row['id'], $row['first'], $row['last']);

        return $authors;
    }

    function getAuthorsTopThreeWeek()
    {
        $authors = [];
        $query = "  SELECT id, first, last, COUNT(author.id) as ile FROM author 
                    JOIN author_article ON id = author_article.author_id
                    WHERE author_article.article_id IN (
                        SELECT id FROM article 
	                    WHERE DATE(creation_time) between  DATE_SUB(DATE(NOW()), INTERVAL 1 WEEK) and DATE(NOW())  )
                    GROUP BY author.id  
                    ORDER BY `ile`  DESC
                    LIMIT 3";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0)
            while ($row = $result->fetch_assoc())
                $authors[] = $row;

        return $authors;
    }

}

//----TEST

//$db = new DataBase('localhost', 'root', '', 'meczyki');
//$db->insertArticle('Uderzył się w pięte, a strzelił gola! [ZOBACZ JAK]', 'Nic takiego nie miało miejsca ale fajnie by było nie?');
//$db->insertAuthor('Jan', 'Brzechwa');
//$db->insertAuthorArticle(7,9);
//$db->deleteArticle(5);
//$db->deleteAuthor(3);
//$db->deleteAuthorArticle(4,6);
//$db->updateAuthor(4, 'Janusz', 'Golf');
//$db->updateArticle(6, 'Pan Janusz kupił cebulę', 'To jest gość!');

//$article = $db->selectArticleById(6);
//echo "$article->id $article->title $article->text";

//$articles = $db->selectAllArticles();
//foreach ($articles as &$article)
//    echo "$article->id $article->title $article->text <br>";

//$articles = $db->selectArticlesByAuthor(7);
//foreach ($articles as &$article)
//    echo "$article->id $article->title $article->text <br>";

//$authors = $db->getAuthorsTopThreeWeek();
//foreach ($authors as &$author)
//    echo "$author->id $author->first $author->last <br>";

//$db->conn->close();