<?php
 class Post {
     //DB Related
     private $conn;
     private $table = 'posts';


     // Post Properties
     public $id;
     public $episode_id;
     public $category_name;  //going to use a join to get category name
     public $title;
     public $description;
     public $created_at;
     public $download_url;



     // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

//Get Posts
public function read() {
    //Create query
    $query = 'SELECT 
         c.name as category_name,
         p.id, 
         p.episode_id,
         p.title,
         p.description,
         p.created_at,
         p.download_url
        FROM
          ' . $this->table . ' p
        LEFT JOIN
          categories c ON p.episode_id = c.id
        ORDER BY
           p.created_at  DESC';

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    //Execute query
    $stmt->execute();

    return $stmt;
 }

 //Get Single Post
 public function read_single() { 
  //Create query
  $query = 'SELECT 
       c.name as category_name,
       p.id, 
       p.episode_id,
       p.title,
       p.description,
       p.created_at,
       p.download_url
      FROM
        ' . $this->table . ' p
      LEFT JOIN
        categories c ON p.episode_id = c.id
      WHERE
         p.id = ?
      LIMIT 0,1';



 // Prepare statement
 $stmt = $this->conn->prepare($query);
 // Bind ID
 $stmt->bindParam(1, $this->id);


// Execute query
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);



      //Set Properties
      $this->title = $row['title'];
      $this->episode_id = $row['episode_id'];
      $this->description = $row['description'];
      $this->download_url = $row['download_url'];
      $this->category_name = $row['category_name'];
 }

/// Create Post
public function create() {
  // Create query
  $query = 'INSERT INTO ' . $this->table . ' SET title = :title, episode_id = :episode_id, description = :description, download_url = :download_url';
  // Prepare statement
  $stmt = $this->conn->prepare($query);



      //Clean data 
      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->description = htmlspecialchars(strip_tags($this->description));
      $this->download_url = htmlspecialchars(strip_tags($this->download_url));
      $this->episode_id = htmlspecialchars(strip_tags($this->episode_id));


      //Bind data
      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':download_url', $this->download_url);
      $stmt->bindParam(':episode_id', $this->episode_id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
}



}