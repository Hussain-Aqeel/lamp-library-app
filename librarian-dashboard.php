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
  <div class="row">
      <div class="col-9">
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


        <br>
        <br>
        <h1 class="mb-3 mt-4">Borrows</h1>  

        <table class="table table-hover" id="table2">
          <thead>
            <tr class="header">
              <th scope="col">Reserve_Date</th>
              <th scope="col">ISBN_Code</th>
              <th scope="col">Status</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody class="items">
            <tr class="table-light" id="<%= counter++ %> ">
              <td class="title row-data">5/2/2022</td>
              <td class="lang row-data">11556626849</td>
              <td class="subject row-data">active</td>
              <td><button type="button" 
                class="btn btn-danger">cancel</button></td>
            </tr>
            <tr class="table-light" id="<%= counter++ %> ">
              <td class="title row-data">5/2/2022</td>
              <td class="lang row-data">11556626849</td>
              <td class="subject row-data">active</td>
              <td><button type="button" 
                class="btn btn-danger">cancel</button></td>
            </tr>
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