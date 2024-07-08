<?php 

header('Access-Control-Allow-Origin: *' );
header('Content-Type: application/json');

include_once('../core/initialize.php');

// instantiate post 

$post = new Category($db);

$result = $post->read();
// get row count 
$num = $result->rowCount();

if ($num > 0){
    $post_arr = array();
    $post_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id' => $id,
            'name' => $name,
            'created_at' => $created_at
            

        );
        array_push($post_arr['data'], $post_item);
    }
    // convert to json and output
    echo json_encode($post_arr);
} else {
    echo json_encode(array('message' => 'No categories found.'));
}