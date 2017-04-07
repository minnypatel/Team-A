<?php

namespace Model;

include_once 'Dbconnection.php';

Class ArticleDAO {

    protected $connection;
    
    public function __construct(Model\Dbconnection $connection) {
        $this->connection = $connection;
    }
    
    public function getAll() {
        $list = [];
        $request = $this->connection->prepare('SELECT title, content, filepath FROM article');
        $request->execute();

        // we create a list of Post objects from the database results
        foreach($request as $item) {
            $article = new Article($item['title'], $item['content']);
            $image = new File();
            $image->setLocation($item['filepath']);
            $article->setImage($image);
            $list[] = $article;
        }
        
        // we'll use this as a foreach in the index

        return $list;
    }
}