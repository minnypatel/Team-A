<?php

//use 'DbConnection.php';

Class Article {
    
    public $id;
    public $title;
    public $content;
    public $contributor;
    public $date_upload;
    public $date_modified;
    
    public function __construct($id, $title, $content) {
        $this->id      = $id;
        $this->title   = $title;
        $this->content = $content;
    }

    public static function getAll() {
        $list = [];
        $db = $DbConnection::getDb();
        $request = $db->prepare('SELECT * FROM article');
        $request->execute();

        // we create a list of Post objects from the database results
        foreach($request as $item) {
            $list[] = new Article($item['id'], $item['title'], $item['content']);
        }

        return $list;
    }
    
}
