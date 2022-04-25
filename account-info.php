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
    <link rel="stylesheet" href="./assets/stylesheet/stylesheet.css">
    <title>Library App - account info</title>
</head>
<body>

  <?php include('nav.php') ?>

  <div class="container mt-4" style="min-height: 85vh;">
    <h1 class="text-dark">Account information</h1>
    <hr>

    <div class="col-12 col-lg-6">
        <form class="form-group">
          <label style="font-size: 2em;" for="name">Name:</label>
          <div id="nameArea" class="input-group input-group-lg">
            <input id="name" 
                   name="name" 
                   type="text" 
                   class="form-control" 
                   value="<%= name %>" 
                   disabled
                   style="padding: 1.5em 0 1.5em 1em;"
                   >
            <div id="edit-name" class="input-group-append">
              <a class="input-group-text" onclick="editName()">
                <i id="name-icon" class="fa fa-edit"></i>
              </a>
            </div>
          </div>

          <br>

          <label style="font-size: 2em;" for="email">Email:</label>
          <div id="emailArea" class="input-group input-group-lg">
            <input id="email" 
                  name="email" 
                  type="text" 
                  class="form-control" 
                  value="{{ user's email should be showing here }}" 
                  disabled
                  style="padding: 1.5em 0 1.5em 1em;"
                  >

            <div id="edit-email" class="input-group-append">
              <a class="input-group-text" onclick="editEmail()">
                <i id="email-icon" class="fa fa-edit"></i>
              </a>
            </div>
          </div>

          <br>

          <label style="font-size: 2em;" for="password">Password:</label>
          <div id="passwordArea" class="input-group input-group-lg">
            <input id="password" 
                  name="password" 
                  type="text" 
                  class="form-control" 
                  value="******" 
                  disabled
                  style="padding: 1.5em 0 1.5em 1em;"
                  >

            <div id="edit-password" class="input-group-append">
              <a class="input-group-text" onclick="editPassword()">
                <i id="password-icon" class="fa fa-edit"></i>
              </a>
            </div>
          </div>
      </form>
    </div>
  </div>

  <?php require_once('footer.php') ?>

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

  <script>
    editName = async () => {
      const btn = document.createElement("button");
      btn.type = 'submit';
      btn.classList = 'btn btn-dark rounded ml-3';
      btn.innerText = 'Edit';
      document.getElementById('nameArea').appendChild(btn);
      document.getElementById('name').disabled = false;

      document.getElementById('edit-name').style.display = 'none';

      console.log('done');

    }

    editEmail = () => {
      const btn = document.createElement("button");
      btn.type = 'submit';
      btn.classList = 'btn btn-dark rounded ml-3';
      btn.innerText = 'Edit';
      document.getElementById('emailArea').appendChild(btn);
      document.getElementById('email').disabled = false;

      document.getElementById('edit-email').style.display = 'none';


    }

    // needs some modifications
    editPassword = () => {
      const btn = document.createElement("button");
      btn.type = 'submit';
      btn.classList = 'btn btn-dark rounded ml-3';
      btn.innerText = 'Edit';
      document.getElementById('passwordArea').appendChild(btn);
      document.getElementById('password').disabled = false;

      document.getElementById('edit-password').style.display = 'none';

    }

  </script>

</body>
</html>