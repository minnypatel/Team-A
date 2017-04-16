<?php

namespace Model;

include_once 'DbConnection.php';
include_once 'File.php';

use \Model\DbConnection;
use \Model\File;

Class ArticleDAO {
    protected $connection;
    
    public function __construct(DbConnection $connection) {
        $this->connection = $connection;
    }
    
    public function getAll() {
        $list = [];
        $request = $this->connection->prepare("SELECT id, title, content, filepath, category FROM article");
        $request->execute();

        foreach($request as $item) {
            $article = new Article($item['title'], $item['content']);
            $article->setId($item['id']);
            $image = new File();
            $image->setLocation($item['filepath']);
            $article->setImage($image);
            $article->setCategory($item['category']);
            $list[] = $article;
        }
        return $list;
    }
    
    public function getCategory($thing) {
        $list = [];
        $request = $this->connection->prepare("SELECT id, title, content, filepath, category FROM article WHERE category = :thing");
        $request->execute(['thing' => $thing]);
        
        foreach($request as $item) {
            $article = new Article($item['title'], $item['content']);
            $article->setId($item['id']);
            $image = new File();
            $image->setLocation($item['filepath']);
            $article->setImage($image);
            $article->setCategory($item['category']);
            $list[] = $article;
        }
        return $list;
    }
    
    public function saveArticle(Article $article) {
           
        $stmt = $this->connection->prepare("INSERT INTO article (title, content, filepath, category)
                                      VALUES (:title, :content, :filepath, :category)");

        $stmt->execute([
            'title'    => $article->getTitle(), 
            'content'  => $article->getContent(),
            'filepath' => $article->getImage()->getLocation(),
            'category' => $article->getCategory()
            ]);  
    }
}
