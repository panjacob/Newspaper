recruitment for Backend / PHP dev @ meczyki.pl
Project meczyki - Simple news article system

1) init.sql - create tables in MySQL database, table name should be 'meczyki' otherwise variable in DataBase.php should be changed.
username and password also can be changed in DataBase.php
2) API: API response format is JSON
http://localhost/meczyki/api/getauthorstopthreeweek.php -  Get top 3 authors that wrote the most articles last week.
http://localhost/meczyki/api/getarticlesbyauthor.php?id=2 - Get article by some id
http://localhost/meczyki/api/getarticlesbyauthor.php?id=10 -  Get all articles for given author
3) HTML FORMS:
index.php - Read all articles. Go to edit article. Delete article.
editarticleform.php - edit: title, text. Read authors of article. Add or delete author of article.
authorsform.php - Read all authors in service. Delete author.
addarticleform.php - Add article.
addauthorform.php - Add author.