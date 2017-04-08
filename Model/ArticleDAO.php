<?php

namespace Model;

include_once 'Dbconnection.php';
include_once 'File.php';

use \Model\Dbconnection;
use \Model\File;

Class ArticleDAO {

    protected $connection;
    
    public function __construct(\Model\Dbconnection $connection) {
        $this->connection = $connection;
    }
    
    public function getAll() {
        $list = [];
        $request = $this->connection->prepare('SELECT id, title, content, filepath, date_uploaded FROM article');
        $request->execute();

        // in this loop use a $artile->setContributor to grab the relevant data from the dbtable
        foreach($request as $item) {
            $article = new Article($item['title'], $item['content'], $item['date_uploaded']);
            // if there's no image skip the image stage
            $article->setId($item['id']);
            $image = new File();
            $image->setLocation($item['filepath']);
            $article->setImage($image);
            $list[] = $article;
        }
        return $list;
    }
}