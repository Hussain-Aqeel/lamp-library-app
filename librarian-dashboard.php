<?php
  session_start();
  require_once "connection.php";
  require_once 'auth_lib.php';

  $sql_query = "SELECT * FROM book";
  $result = mysqli_query($link, $sql_query);
  $row = mysqli_fetch_array($result);
  $last_id = 0;

  while($row = $result->fetch_assoc()) {
    $last_id = $row["id"];
  }

  $last_id++;

  // TODO: add a book to database
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // /** @var mysqli $link */
      /** @var mysqli $link */
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $genre = mysqli_real_escape_string($link, $_POST['genre']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $genre = mysqli_real_escape_string($link, $_POST['genre']);
    $authorPage = mysqli_real_escape_string($link, $_POST['author-page']);
    $pic = mysqli_real_escape_string($link, $_POST['pic']);
  

    $sql_insert_query = 
      "INSERT INTO `book` (`id`, `title`, `author_id`, `genre_id`, `image_url`, `description`) VALUES
      ({$last_id}, '{$title}', {$author}, ${genre}, '{$pic}');";

  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/4/sandstone/bootstrap.min.css">
    <title>Library App - Dashboard</title>
</head>
<body>

<?php include('nav.php') ?>

<div class="container mb-5" style="min-height: 82vh;">
  <br>
  <h1 class="mt-4 d-flex justify-content-between"><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?>
    <span class="lm-5 mb-2 lg-sm badge rounded-pill bg-warning">LIBRARIAN</span>
  </h1>

  <br>
  <br>
  <div class="row">
      <div class="col-9">
      <h1 class="mt-4 mb-3">List of Books</h1>
        <!--  -->
        <table class="table table-hover" id="table">
          <thead>
            <tr class="header">
              <th scope="col">ID</th>
              <th scope="col">title</th>
              <th scope="col">genre</th>
              <th scope="col">author</th>
              <th scope="col"> </th>
              <th scope="col"> </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody class="items">

          <?php 

          $sql_query = "SELECT * FROM book";
          $result = mysqli_query($link, $sql_query);
          $row = mysqli_fetch_array($result);
          
          if ($result->num_rows > 0) {
        
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $image_url = $row["image_url"]; 
              $author_name_query = "SELECT * FROM author WHERE id='{$row["author_id"]}'";
              $author_name_result = mysqli_query($link, $author_name_query);
              $author_name = mysqli_fetch_array($author_name_result);

              $genre_name_query = "SELECT * FROM genre WHERE id='{$row["genre_id"]}'";
              $genre_name_result = mysqli_query($link, $genre_name_query);
              $genre_name = mysqli_fetch_array($genre_name_result);
              ?>
              <tr class="table-light" id="<?php echo htmlspecialchars($row["id"]); ?>">
                <td class="isbn row-data"><?php echo $row["id"] ?></td>
                <td class="title row-data"><?php echo $row["title"] ?></td>
                <td class="lang row-data"><?php echo $genre_name["name"] ?></td>
                <td class="subject row-data"><?php echo $author_name["name"] ?></td>
                <td><button type="button" 
                  class="btn btn-dark"
                  data-toggle="modal" 
                  data-target="#edit-modal">Edit</button></td>
                <td><button type="button" 
                  class="btn btn-danger" 
                  data-toggle="modal" 
                  data-target="#delete-modal">Delete</button></td>
              </tr>
            <?php } ?>
          <?php } ?>
          </tbody>
        </table>


        <br>
        <br>
        <h1 class="mb-3 mt-4">Borrows</h1>  

        <table class="table table-hover" id="table2">
          <thead>
            <tr class="header">
              <th scope="col">id</th>
              <th scope="col">user</th>
              <th scope="col">book</th>
              <th scope="col">borrowing date</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody class="items">
          <?php 
            $borrowing_query = "SELECT * FROM borrowing";
            $borrowing_query_result = mysqli_query($link, $borrowing_query);
            $borrowing_result = mysqli_fetch_array($borrowing_query_result);


            if ($borrowing_query_result->num_rows > 0) {
              
              while($borrowing_result = $borrowing_query_result->fetch_assoc()) {

                $books_query = "SELECT * FROM book WHERE id='{$borrowing_result["book_id"]}'";
                $books_query_result = mysqli_query($link, $books_query);
                $books_result = mysqli_fetch_array($books_query_result);
                
                $users_query = "SELECT * FROM user WHERE id='{$borrowing_result["user_id"]}'";
                $users_query_result = mysqli_query($link, $users_query);
                $users_result = mysqli_fetch_array($users_query_result);
          ?>
                <tr class="table-light" id="">
                  <td class="title row-data"><?php echo $borrowing_result["id"] ?></td>
                  <td class="lang row-data"><?php echo $users_result["fname"]. ' ' .$users_result["lname"] ?></td>
                  <td class="subject row-data"><?php echo $book_result["title"] ?></td>
                  <td class="subject row-data"><?php echo date('Y-m-d', strtotime($borrowing_result["date"])) ?></td>
                  <td><button type="button" 
                    class="btn btn-danger">cancel</button></td>
                </tr>
            <?php } ?>
          <?php } ?>
          </tbody>
        </table>
      </div>

        <div id="addBook" class="col-3">

        <h3 class="font-weight-bold">Add a new book</h3>
        <form>
            <div class="form-group">
              <label class="col-form-label col-form-label-sm" for="title">Title</label>
              <input class="form-control form-control-sm"
                      required
                      name="title" 
                      type="text" 
                      id="title"
                      >
            </div>
            <div class="form-group">
              <label class="col-form-label col-form-label-sm" for="genre">Genre</label>
              <input class="form-control form-control-sm"
                      required 
                      name="genre" 
                      type="text" 
                      id="genre"
                      >
            </div>
            <div class="form-group">
              <label class="col-form-label col-form-label-sm" for="author">Author</label>
              <input class="form-control form-control-sm"
                      required 
                      name="author" 
                      type="text" 
                      id="author"
                      >
            </div>
            <div class="form-group">
              <label class="col-form-label col-form-label-sm" for="author-page">Author's wiki page</label>
              <input class="form-control form-control-sm" 
                      name="author-page" 
                      type="text" 
                      id="author-page"
                      >
            </div>
            <div class="form-group">
              <label class="col-form-label col-form-label-sm" for="pic">Choose a picture</label>
              <input class="form-control form-control-lg pb-4"
                      required
                      name="pic" 
                      type="file" 
                      accept="image/*"
                      id="pic"
                      >
            </div>
            <button type="submit" class="btn btn-dark d-block w-100">Add book</button>
        </form>
      </div>
  </div>


</div>

<?php include('footer.php') ?>

<!-- bootstrap javascript files-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/9e12db6cc8.js" crossorigin="anonymous"></script>
<!-- this jquery for the hamburger menu -->
<script>
    $('.dropdown-toggle').dropdown();
    $('#users-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
</script>
</body>
</html>