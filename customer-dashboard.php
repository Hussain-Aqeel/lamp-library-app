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
  <h1 class="my-4 d-flex justify-content-between">{{Customer's name}}
    <span class="lm-5 mb-2 lg-sm badge rounded-pill bg-warning">{{ Role }}</span>
  </h1>
  <hr>

  <h1 class="mb-4 ml-4">Borrows</h1>  

      <table class="table table-hover" id="table2">
        <thead>
          <tr class="header">
            <th scope="col">Reserve_Date</th>
            <th scope="col">ISBN_Code</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody class="items">
          <tr class="table-light" id="<%= counter++ %> ">
            <td class="title row-data">5/2/2022</td>
            <td class="lang row-data">11556626849</td>
            <td class="subject row-data">active</td>
          </tr>
          <tr class="table-light" id="<%= counter++ %> ">
            <td class="title row-data">5/2/2022</td>
            <td class="lang row-data">11556626849</td>
            <td class="subject row-data">active</td>
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