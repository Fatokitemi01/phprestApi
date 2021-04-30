<?php
//Headers
header('Access- Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/post.php';

//Instantiate DB & connect

$database= new Database();
$db = $database->connect();

//Instantiate Blog Post object

$post = new Post($db);

//Blog post Query

$result = $post->read();

$num =$result->rowCount();

//check if any posts
if($num>0){

    $post_arr =array();
    $post_arr['data']= array();

    while($row =$result->fetch(PDO::FETCH_ASSOC)){
        extraxt($row);
//create post item for each post
        $post_item = array{
            'id'=>$id,
            'title'=>$title,
            'body'=>html_entity_decode($body),
            'author'=>$author,
            'category_id'=>$category_id,
            'category_name'=>$category_name
            
        };

        //push to "data"

        array_push($posts_arr['data'],$post_item);
    }

    //turn to JSON and output

    echo json_encode($post_arr);
}
else{
    echo json_encode(
        array('message' => 'No post found')
    );

}