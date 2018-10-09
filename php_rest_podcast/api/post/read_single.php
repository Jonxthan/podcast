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

 //Get ID 
 $post->id = isset($_GET['id']) ? $_GET['id'] : die();

 //Get Post
 $post->read_single();

 //Create array
 $post_arr = array(
     'id' => $post->id,
     'title' => $post->title,
     'description' => $post->description,
     'episode_id' => $post->episode_id,
     'download_url' => $post->download_url,
     'category_name' => $post->category_name
 );

 //Make JSON
 print_r(json_encode($post_arr));