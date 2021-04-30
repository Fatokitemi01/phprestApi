<?php

class Post{
    //DB stuff
    private $conn;
    private table ='posts';

    //post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    //constructor with DB

    public function _construct($db){
        $this-> conn =$db;
    }

    //Get Post

    public function read(){
        //create query
        $query = 'SELECT 
        c.name as category_name,
        p.id,
        p.category_id;
        p.title;
        p.body;
        p.author;
        p class="created_at"
       FROM
       ' .$this-> table. 'p
       LEFT JOIN
        categories c ON p.category_id =c.id
        ORDER BY
        p.created_at DESC';

        //Prepared Statement
        $stmt =$this->conn->prepare($query);
        //Execute Query
        $stmt -> execute();

        return $stmt;



    


        
    }
}