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
        echo "POST\n"; print_r($_POST); echo "\n";
        echo "ARTICLE CLASS\n"; print_r($article); echo "\n";
        $articleUploader = new ArticleDAO(Dbconnection::getInstance());
        $articleUploader->saveArticle($article);
//        header("location:index.php");
    }
    
    private function convertImageName(&$imageName) {
        $array = str_split($imageName);
        foreach($array as &$i) {
            if ($i == " ") {
                $i = "-";
            }
        }
        $imageName = implode($array);
    }
    
    private function moveFile(Article &$article) {
        $file = $article->getImage();
        $imageName = $file->getName();
        $this->convertImageName($imageName);
        
        $dstFile = 'Uploads/'.$imageName;
        
        if (!move_uploaded_file($file->getLocation(), $dstFile)) {
            throw new \Exception("Handle Error");    
        }
        
        $file->setLocation($dstFile); 
        $article->setImage($file);  
    }
}