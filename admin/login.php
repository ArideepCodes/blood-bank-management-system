<?php
session_start();  // Start session at the very top
include 'conn.php'; // Connect to live database
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <!-- Bootstrap CSS & JS from CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('admin_image/blood-cells.jpg'); background-size:cover;">

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container" style="margin-top:200px;">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h1 class="mt-4 mb-3" style="color:#D2F015;">
            Blood Bank & Management<br>Admin Login Portal
          </h1>
        </div>
      </div>

      <div class="card" style="height:250px; background-image:url('admin_image/glossy1.jpg'); background-size:cover;">
        <div class="card-body">

          <div class="row justify-content-center">
            <div class="col-lg-6 mb-3">
              <label class="font-italic" style="font-weight:bold">Username <span style="color:red">*</span></label>
              <input type="text" name="username" placeholder="Enter your username" class="form-control" required>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-6 mb-3">
              <label class="font-italic" style="font-weight:bold">Password <span style="color:red">*</span></label>
              <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-4 text-center">
              <input type="submit" name="login" class="btn btn-primary mt-3" value="LOGIN" style="cursor:pointer">
            </div>
          </div>

        </div>
      </div>
    </div>
  </form>

<?php
if(isset($_POST["login"])) {

    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // If your DB stores MD5 hashed passwords, uncomment next line
    // $password = md5($password);

    $sql = "SELECT * FROM admin_info WHERE admin_username='$username' AND admin_password='$password'";
    $result = mysqli_query($conn, $sql) or die("Query failed.");

    if(mysqli_num_rows($result) > 0){
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard
        exit(); // Important to stop execution after redirect
    } else {
        echo '<div class="alert alert-danger mt-3" style="font-weight:bold">Username and Password are not matched!</div>';
    }
}
?>
</body>
</html>
