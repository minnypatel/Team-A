<?php

namespace Model;

include_once 'DbConnection.php';
include_once 'File.php';

use \Model\DbConnection;
use \Model\File;

Class ArticleDAO
{
    protected $connection;
    
    public function __construct(DbConnection $connection) {
        $this->connection = $connection;
    }
    
    public function getAll() {
        $list = [];
        $request = $this->connection->prepare("SELECT id, title, content, filepath, category, contributor FROM article");
        $request->execute();

        foreach($request as $item) {
            $article = new Article($item['title'], $item['content']);
            $article->setId($item['id']);
            
            $image = new File();
            $image->setLocation($item['filepath']);
            $article->setImage($image);
            
            $article->setCategory($item['category']);
            
            $contributor = new Contributor($item['contributor']);
            $article->setContributor($contributor);
            
            $list[] = $article;
        }
        return $list;
    }
    
    public function getCategory($hipsterCat) {
        $list = [];
        $request = $this->connection->prepare("SELECT id, title, content, filepath, category, contributor FROM article WHERE category = :hipsterCat");
        $request->execute(['hipsterCat' => $hipsterCat]);
        
        foreach($request as $item) {
            $article = new Article($item['title'], $item['content']);
            $article->setId($item['id']);
            
            $image = new File();
            $image->setLocation($item['filepath']);
            $article->setImage($image);
            
            $article->setCategory($item['category']);
            
            $contributor = new Contributor($item['contributor']);
            $article->setContributor($contributor);
            
            $list[] = $article;
        }
        return $list;
    }
    
    public function saveArticle(Article $article) {
           
        $stmt = $this->connection->prepare("INSERT INTO article (title, content, filepath, category, contributor)
                                      VALUES (:title, :content, :filepath, :category, :contributor)");

        $stmt->execute([
            'title'    => $article->getTitle(), 
            'content'  => $article->getContent(),
            'filepath' => $article->getImage()->getLocation(),
            'category' => $article->getCategory(),
            'contributor' => $article->getContributor()->getUsername()
            ]);  
    }
}
