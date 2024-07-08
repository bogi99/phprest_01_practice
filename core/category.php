<?php
class Category{
        // db stuff 
        private $conn ;
        private $table = 'categories';

        // post properties 

        public $id;
        public $name;
        public $created_at;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = 'select * 
            from '.$this->table.' ;'  ;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt ;

        }
}