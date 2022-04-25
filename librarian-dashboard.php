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
  <h1 class="mt-4 d-flex justify-content-between">{{ librarian's name }}
    <span class="lm-5 mb-2 lg-sm badge rounded-pill bg-warning">LIBRARIAN</span>
  </h1>

  <br>
  <br>
  <h1 class="mt-4 mb-3">List of Books</h1>
        <!--  -->
        <table class="table table-hover" id="table">
          <thead>
            <tr class="header">
              <th scope="col">ID</th>
              <th scope="col">genre</th>
              <th scope="col">title</th>
              <th scope="col">author</th>
              <th scope="col"> </th>
              <th scope="col"> </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody class="items">
            <tr class="table-light" id="">
              <td class="isbn row-data">1</td>
              <td class="title row-data">Fiction</td>
              <td class="lang row-data">Harry Potter and the Goblet of Fire</td>
              <td class="subject row-data">J.K Rolling</td>
              <td><button type="button" 
                class="btn btn-dark"
                data-toggle="modal" 
                data-target="#edit-modal">Edit</button></td>
              <td><button type="button" 
                class="btn btn-danger" 
                data-toggle="modal" 
                data-target="#delete-modal">Delete</button></td>
            </tr>

            <tr class="table-light" id="">
              <td class="isbn row-data">2</td>
              <td class="title row-data">Novel</td>
              <td class="lang row-data">Crime and Punishment</td>
              <td class="subject row-data">Fyodor Dostoevsky</td>
              <td><button type="button" 
                class="btn btn-dark"
                data-toggle="modal" 
                data-target="#edit-modal">Edit</button></td>
              <td><button type="button" 
                class="btn btn-danger" 
                data-toggle="modal" 
                data-target="#delete-modal">Delete</button></td>
            </tr>
          </tbody>
        </table>


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