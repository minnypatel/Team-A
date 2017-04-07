<?php

namespace Model;

include_once 'Dbconnection.php';

Class Article {
    
    protected $id;
    protected $title;
    protected $content;
    protected $image;
    protected $contributor;
    protected $date_upload;
    protected $date_modified;
    
    public function __construct($title, $content) {
        $this->title   = $title;
        $this->content = $content;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        // for edit functionality?
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function setContent($content) {
        // for edit functionality?
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function setImage(File $image) {
        $this->image = $image;
    }
    
    
}