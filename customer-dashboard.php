<?php
  session_start();
  include_once('connection.php');
  require_once 'customer_auth.php'; ?>

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


<div class="container mb-5" style="min-height: 79vh;">
  <h1 class="my-4 d-flex justify-content-between">
    <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
    <span class="lm-5 mb-2 lg-sm badge rounded-pill bg-warning">Member</span>
  </h1>
  <hr>

  <?php 
  $borrowing_query = "SELECT * FROM borrowing WHERE user_id='{$_SESSION["id"]}'";
  $borrowing_query_result = mysqli_query($link, $borrowing_query);
  $borrowing_result = mysqli_fetch_array($borrowing_query_result);

?>

  <h1 class="mb-4 ml-4">Borrows</h1>  

      <table class="table table-hover" id="table2">
        <thead>
          <tr class="header">
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody class="items">
        
        <?php 
        if ($borrowing_query_result->num_rows > 0) {
          
          while($borrowing_result = $borrowing_query_result->fetch_assoc()) {

            $books_query = "SELECT * FROM book WHERE id='{$borrowing_result["book_id"]}'";
            $books_query_result = mysqli_query($link, $books_query);
            $books_result = mysqli_fetch_array($books_query_result);
            
          ?>

          <tr class="table-light">
            <td class="row-data"> <?php echo $books_result["id"] ?> </td>
            <td class="row-data"> <?php echo $books_result["title"] ?> </td>
            <td class="row-data"> <?php echo $books_result["author_id"] ?> </td>
            <td class="row-data"> <?php echo $books_result["genre_id"] ?> </td>
            <td class="row-data"> <?php echo date('Y-m-d', strtotime($borrowing_result["date"])) ?> </td>
          </tr>

        <?php } ?>
      <?php } ?>
        </tbody>
      </table>
</div>

<?php include('footer.php'); ?>

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