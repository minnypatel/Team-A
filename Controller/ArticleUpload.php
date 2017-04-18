<?php

namespace Controller;

include_once 'Model/DbConnection.php';
include_once 'Model/ArticleDAO.php';
include_once 'Model/Article.php';

use \Model\DbConnection;
use \Model\ArticleDAO;
use \Model\Article;

Class ArticleUpload 
{    
    const INPUTKEY = 'userFile';
    const ALLOWEDTYPES = ['image/jpeg', 'image/JPEG', 'image/jpg', 'image/JPG', 'image/gif', 'image/png'];

    public function upload(Article $article) {
//        try {
        $this->errorHandleFile();
//        }
//        catch (\Exception $e) {
//            echo $e;
//        }
        if ($article->getImage()->getLocation() !== "") {
            $this->moveFile($article);
        }
        $articleUploader = new ArticleDAO(Dbconnection::getInstance());
        $articleUploader->saveArticle($article);
        header("location:index.php");
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
    
    private function errorHandleFile() {
        if (empty($_FILES)) {
            throw new \Exception("File not loaded: check the size is under 2MB\n");
        }
        elseif (empty($_FILES[ArticleUpload::INPUTKEY]['name'])) {  
            throw new \Exception("File missing!");   
        }
        elseif (!in_array($_FILES[ArticleUpload::INPUTKEY]['type'], ArticleUpload::ALLOWEDTYPES)){
            throw new \Exception("File Type Not Allowed");    
        }
        elseif ($_FILES[InputKey]['error'] > 0) {   
            throw new \Exception("Unknown error. What have you done?");    
        }
    }
}