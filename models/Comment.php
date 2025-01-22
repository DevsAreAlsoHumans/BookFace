<?php
require_once __DIR__. '/../config/database.php';

class Comment{

    private $db;

    public function __construct(){
        $this->db = Database::getConnection();
    }
    
}
?>