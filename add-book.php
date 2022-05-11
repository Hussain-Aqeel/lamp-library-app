<?php 
session_start();
  require_once "connection.php";
  require_once 'auth_lib.php';

  $sql_query = "SELECT * FROM book";
  $result = mysqli_query($link, $sql_query);
  $row = mysqli_fetch_array($result);


  // TODO: add a book to database

  $fileToUpload = $_POST['fileToUpload'];
  $target_dir = "./assets/img/";
  $target_file = $target_dir . basename($_FILES[$fileToUpload]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  $check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES[$fileToUpload]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES[$fileToUpload]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

    $title = mysqli_real_escape_string($link, $_POST['title']);
    $genre = mysqli_real_escape_string($link, $_POST['genre']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $image_url = $target_dir . basename( $_FILES["fileToUpload"]["name"]);
  
    $genre_query = "SELECT * FROM genre WHERE name='$genre'";
    $genre_result = mysqli_query($link, $genre_query);
    $genre_row = mysqli_fetch_array($genre_result);

    $author_query = "SELECT * FROM author WHERE name='$author'";
    $author_result = mysqli_query($link, $author_query);
    $author_row = mysqli_fetch_array($author_result);

    $author = $author_row['id'];
    $genre = $genre_row['id'];

    $sql_insert_query =
      "INSERT INTO `book` (`id`, `title`, `author_id`, `genre_id`, `image_url`, `description`) VALUES
      (default, '$title', $author, $genre, '$image_url', '$description');";

    mysqli_query($link, $sql_insert_query);
    echo $sql_insert_query;
?>