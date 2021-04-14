<?php 
   
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "toyin_test_db";

   $conn = new mysqli($servername, $username, $password, $dbname);

   $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

   if ($contentType === "application/json") {

      $content = trim(file_get_contents("php://input"));

      $decoded = json_decode($content, true);

      
      $data = json_decode($content, true);

      $title = strval($data['title']);
      $body = strval($data['body']);

      if(! is_array($decoded)) {

      } else {
         //echo 'Error on json file';
      }

      if ($conn === false) {
         die("Connection failed: " . $conn->connect_error);
         }
         
      $sql = "INSERT INTO posts (title, body) VALUES ('$title', '$body')";
   
      if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();



      
   }

   /*

   
   

   
   */
    
?>
