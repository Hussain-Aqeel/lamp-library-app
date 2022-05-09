<?php 

session_start();

// Include config file
require_once "config.php";
require_once "connection.php";
 
// Define variables and initialize with empty values
$firstName = $lastName = $email = $password = $password2 = "";
$errors = array(); 

// connect to the database
// $db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($link, $_POST['firstName']);
  $lname = mysqli_real_escape_string($link, $_POST['lastName']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $password = mysqli_real_escape_string($link, $_POST['password']);
  $password2 = mysqli_real_escape_string($link, $_POST['password2']);
  $role = mysqli_real_escape_string($link, 3);
  $status = mysqli_real_escape_string($link, 1);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($password != $password2) {
	  array_push($errors, "passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($link, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    $query = "INSERT INTO user (role_id, status, email, password, fname, lname) 
          VALUES('$role', '$status', '$email' ,'$password', '$fname', '$lname')";
    
    mysqli_query($link, $query);
   
    $_SERVER['success'] = "success";
    header("location: login.php?". $_SERVER['success']);
  }
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
  <title>Library App - Register</title>
</head>
<body>
  <?php require_once('nav.php') ?>

  <div class="mt-5" style="min-height: 81vh;">
    <div class="col-md-3 m-auto">
      <div class="card card-body">
        <h1 class="text-center mb-3">
          <i class="fas fa-user-plus"></i> Register
        </h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <?php include('errors.php'); ?>

          <div class="form-group">
            <label for="firstName">First Name</label>
            <input
              id="firstName"
              name="firstName"
              class="form-control"
              required
            />
          </div>
          <div class="form-group">
            <label for="lastName">last Name</label>
            <input
              id="lastName"
              name="lastName"
              class="form-control"
              required
            />
          </div>
          
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              required
              placeholder="example@example.com"
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              required
              class="form-control"
            />
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input
              type="password"
              id="password2"
              name="password2"
              required
              class="form-control"
            />
          </div>
          <button type="submit" name="reg_user" class="btn btn-primary btn-block">
            Register
          </button>
        </form>
        <p class="lead mt-4">have an account? <a href="login.php" class="text-primary">Login</a></p>
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