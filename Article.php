<?php
class Article
{
    public $id;
    public $title;
    public $text;

    function __construct($id, $title, $text)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
    }
}