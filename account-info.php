<?php session_start() ?>

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
                   value="<?php echo htmlspecialchars($_SESSION["fname"]. " " .$_SESSION["lname"]); ?>" 
                   disabled
                   style="padding: 1.5em 0 1.5em 1em;"
                   >
          </div>

          <br>

          <label style="font-size: 2em;" for="email">Email:</label>
          <div id="emailArea" class="input-group input-group-lg">
            <input id="email" 
                  name="email" 
                  type="text" 
                  class="form-control" 
                  value="<?php echo htmlspecialchars($_SESSION["email"]); ?>" 
                  disabled
                  style="padding: 1.5em 0 1.5em 1em;"
                  >
          </div>

          <br>

          <label style="font-size: 2em;" for="password">Password:</label>
          <div id="passwordArea" class="input-group input-group-lg">
            <input id="password" 
                  name="password" 
                  type="text" 
                  class="form-control" 
                  value="*********" 
                  disabled
                  style="padding: 1.5em 0 1.5em 1em;"
                  >
            <div id="edit-password" class="input-group-append">
              <a class="input-group-text" onclick="editPassword()">
                <i id="password-icon" class="fa fa-edit"></i>
              </a>
            </div>
            <div id="passwordConfirmation" class="input-group input-group-lg mt-2" style="display: none;">
            <label style="font-size: 2em;" for="password">Confirm password:</label>
              <input id="password2" 
              name="password2" 
              type="text" 
              class="form-control" 
              style="display: block; width: 100%;"
              >
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
    // needs some modifications
    editPassword = () => {
      const btn = document.createElement("button");
      btn.type = 'submit';
      btn.classList = 'btn btn-lg btn-dark d-block w-50 mt-4';
      btn.innerText = 'Edit';
      document.getElementById('passwordArea').appendChild(btn);
      document.getElementById('password').disabled = false;
      document.getElementById('password').value = '';

      document.getElementById('edit-password').style.display = 'none';
      document.getElementById('passwordConfirmation').style.display = 'block';


    }

  </script>

</body>
</html>