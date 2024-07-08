<?php 
header('Access-Control-Allow-Origin: *' );
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE' );
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,Authorization, X-Requested-With' );
include_once('../core/initialize.php');

// instantiate post 

$post = new Post($db);

// get posted data

$data = json_decode(file_get_contents("php://input"));
//print_r($data); exit ;
$post->id = $data->id ;


if($post->delete()){
    echo json_encode('message: post deleted',1);
} else {
    echo json_encode('message: post not deleted',1);
}