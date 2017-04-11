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
        $request = $this->connection->prepare('SELECT id, title, content, filepath FROM article');
        $request->execute();

        // in this loop use a $artile->setContributor to grab the relevant data from the dbtable
        foreach($request as $item) {
            $article = new Article($item['title'], $item['content']);
            // if there's no image skip the image stage
            $article->setId($item['id']);
            $image = new File();
            $image->setLocation($item['filepath']);
            $article->setImage($image);
            $list[] = $article;
        }
        return $list;
    }
    
    public function saveArticle(Article $article) {
           
        $stmt = $this->connection->prepare("INSERT INTO article (title, content, filepath)
                                      VALUES (:title, :content, :filepath)");

        $stmt->execute([
            'title'    => $article->getTitle(), 
            'content'  => $article->getContent(),
            'filepath' => $article->getImage()->getLocation()
            ]);  
    }
}
