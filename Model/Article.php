<?php

namespace Model;

include_once 'Dbconnection.php';

Class Article {
    
    protected $id;
    protected $title;
    protected $content;
    protected $image;
    protected $contributor;
    protected $date_uploaded;
    protected $date_modified;
    
    public function __construct($title, $content) {
        $this->title   = $title;
        $this->content = $content;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function setContent($content) {
        $this->content = $content;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function setImage(File $image) {
        $this->image = $image;
    }
}