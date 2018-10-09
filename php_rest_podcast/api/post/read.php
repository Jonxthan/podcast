<?php
 //Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');

 include_once '../../config/Database.php';
 include_once '../../models/Post.php';

 // Instantiate DB & connect 
 $database = new Database();
 $db = $database->connect();

 //Instantiate podcast object 
 $post = new POST($db);

 //Podcast query
 $result = $post->read();
 //Get row count 
 $num = $result->rowCount();

 //Check if any posts
 if($num > 0) {
     //Post array
     $posts_arr = array();
     $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'description' => html_entity_decode($description),
            'episode_id' => $episode_id,
            'category_name' => $category_name,
            'download_url' => $download_url
        );

        //Push to "data"
        array_push($posts_arr['data'], $post_item);

    } 

    //Turn to JSON & output
    echo json_encode($posts_arr);

 } else {
    //No posts
    echo json_encode(
        array('message' => 'No Posts Found')

    );
 }