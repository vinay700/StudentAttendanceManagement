<?php
include('verifyUser.php'); // Includes Login Script



if(isset($_SESSION['login_user']))
{
  if($_SESSION['login_user']=="admin"){
    header("location: admin.php");

  }
  else if($_SESSION['login_user']=="student"){
        header("location: studentlogin.php");

  }
  else if($_SESSION['login_user']=="staff"){
        header("location: stafflogin.php");

  }
  else{
    
  }
}
?>


<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attendance Management Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
      <form  method="POST" action="verifyUser.php" style="max-width:500px;margin:auto">
          <div class="form-group">
            <div class="form-label-group">
             <select class="form-control" name="usertype" required="required" autofocus="autofocus">
              <option value="admin">Admin</option>
              <option value="student">Student</option>
              <option value="staff">Staff</option>
            </select>
        </div>
          </div> 
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required"  name="username" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            
            <input type="submit" class="btn btn-primary btn-block" value="Login">
          </form>
          <div class="text-center">
            <!--<a class="d-block small mt-3" href="register.php">Register an Account</a>-->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>  </body>

</html>
