<?php
// require_once "connection.php";
// session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // username and password sent from form



//     $myusername = mysqli_real_escape_string($link, $_POST['username']);
//     $mypassword = mysqli_real_escape_string($link, $_POST['password']);

//     $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
//     $result = mysqli_query($db, $sql);
//     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//     $active = $row['active'];

//     $count = mysqli_num_rows($result);

//     // If result matched $myusername and $mypassword, table row must be 1 row

//     if ($count == 1) {
//         session_register("myusername");
//         $_SESSION['login_user'] = $myusername;

//         header("location: welcome.php");
//     } else {
//         $error = "Your Login Name or Password is invalid";
//     }
// }

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
  <title>Library App - Login</title>
</head>
<body>
  
<?php require_once('nav.php'); ?>

  <!-- login card with tabs to switch between different actors -->
  <div class="mt-5" style="min-height: 81vh;">
    <div class="col-md-3 m-auto">
      <div class="card text">

        <div class="card-body">
          <h1 class="text-center mb-3"><i class="fa fa-sign-in"></i> Login</h1>          
          <!-- TODO: add flush messages -->

          <div class="tab-content mt-3">
            <div class="tab-pane active" id="member" role="tabpanel">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                  <label for="member-email">email</label>
                  <input
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Enter Your email"
                  />
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control""
                  />
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>
              <p class="lead mt-4">you don't have an account? <a href="register.php" class="text-primary">register now</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('footer.php') ?>

  <!-- bootstrap javascript files-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9e12db6cc8.js" crossorigin="anonymous"></script>
</body>
</html>