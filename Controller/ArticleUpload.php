<?php

namespace Controller;

include_once 'Model/DbConnection.php';
include_once 'Model/ArticleDAO.php';
include_once 'Model/Article.php';

use \Model\DbConnection;
use \Model\ArticleDAO;
use \Model\Article;

Class ArticleUpload {
    
    const InputKey = 'userFile';

    public function upload(Article $article) {
        if ($article->getImage() !== null) {
            $this->moveFile($article);
        }
        $articleUploader = new ArticleDAO(Dbconnection::getInstance());
        $articleUploader->saveArticle($article);
//        header("location:index.php");
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