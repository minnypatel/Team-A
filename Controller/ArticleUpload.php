<?php

namespace Controller;

use \Model\DbConnection;
use \Model\Article;

Class ArticleUpload {
    
    const InputKey = 'userFile';

    public function upload(Article $article) {
        if ($article->getImage() !== null) {
            $this->moveFile($article);
        }
        $this->saveArticle($article);
    }

    
    private function saveArticle(Article $article) {
        
        $instance = DbConnection::getInstance();
        $connection = $instance->getConnection();

    // Move this to DAO??    
        $stmt = $connection->prepare("INSERT INTO article (title, content, filepath)
                                      VALUES (:title, :content, :filepath)");

        $stmt->execute([
            'title'    => $article->getTitle(), 
            'content'  => $article->getContent(),
            'filepath' => $article->getImage()->getLocation()
            ]
        );  
    }
    
    private function moveFile(Article &$article) {
        $file = $article->getImage();
        $dstFile = 'Uploads/'.$file->getName();
        
        if (!move_uploaded_file($file->getLocation(), $dstFile)) {
            throw new \Exception("Handle Error");    
        }
        
        $file->setLocation($dstFile); 
        $article->setImage($file);  
    }
}