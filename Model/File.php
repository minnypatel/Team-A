<?php

namespace Model;

Class File {
    protected $name;
    protected $location;
    
    public function __construct($name = null) {
        $this->name   = $name;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getLocation() {
        return $this->location; 
    }
    
    public function setLocation($location) {
        $this->location = $location; 
    }
}