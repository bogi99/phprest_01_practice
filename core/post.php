<?php 
    // echo "post loaded ";

    class Post{
        // db stuff 
        private $conn ;
        private $table = 'posts';

        // post properties 

        public $id;
        public $title;
        public $category_id;
        public $category_name;
        public $body;
        public $author;
        public $created_at;

        public function __construct($db){
            $this->conn = $db;
        }
        
        public function read(){
            $query = 'select 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body, 
            p.author,
            p.created_at 
            from 
            '.$this->table.' p 
            left join 
                categories c on p.category_id = c.id 
                order by p.created_at desc '  ;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt ;

        }
            
        public function read_single(){
            $query = 'select 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body, 
            p.author,
            p.created_at 
            from 
            '.$this->table.' p 
            left join 
                categories c on p.category_id = c.id 
                where p.id = ? limit 1 '  ;

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id );
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->title =$row['title'];
            $this->body =$row['body'];
            $this->author =$row['author'];
            $this->category_id =$row['category_id'];
            $this->category_name =$row['category_name'];
        }

        public function create(){
            $query = 'insert into '.$this->table.' set 
                title = :title , 
                body = :body , 
                author = :author ,
                category_id = :category_id ;';
            
            $stmt = $this->conn->prepare($query);
            // clean data eh?

            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->body));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category_id = intval(htmlspecialchars(strip_tags($this->category_id)));

            // binding 

            $stmt->bindParam(':title' , $this->title );
            $stmt->bindParam(':body' , $this->body );
            $stmt->bindParam(':author' , $this->author );
            $stmt->bindParam(':category_id' , $this->category_id );

            // execute query 

            if($stmt->execute()){
                return true; 
            }

            // print error
            printf("Error %s. \n" , $stmt->error);
            return false ;



        }

        public function update(){
            $query = 'update '.$this->table.' set 
                title = :title , 
                body = :body , 
                author = :author ,
                category_id = :category_id 
                where id = :id ;';
            
            $stmt = $this->conn->prepare($query);
            // clean data eh?

            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->body));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category_id = intval(htmlspecialchars(strip_tags($this->category_id)));
            $this->id = intval(htmlspecialchars(strip_tags($this->id)));

            // binding 

            $stmt->bindParam(':title' , $this->title );
            $stmt->bindParam(':body' , $this->body );
            $stmt->bindParam(':author' , $this->author );
            $stmt->bindParam(':category_id' , $this->category_id );
            $stmt->bindParam(':id' , $this->id );

            // execute query 

            if($stmt->execute()){
                return true; 
            }

            // print error
            printf("Error %s. \n" , $stmt->error);
            return false ;



        }

        public function delete(){
            $query = 'delete from '. $this->table . ' where id = :id ;';
            $stmt = $this->conn->prepare($query);
            $this->id = intval(htmlspecialchars(strip_tags($this->id)));
            $stmt->bindParam(':id' , $this->id );
            if($stmt->execute()){
                return true; 
            }

            // print error
            printf("Error %s. \n" , $stmt->error);
            return false ;
        }
    }