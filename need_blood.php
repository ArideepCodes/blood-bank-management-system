<?php
// need_blood.php
include('conn.php');
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $hospital = mysqli_real_escape_string($conn, $_POST['hospital']);
  $reason = mysqli_real_escape_string($conn, $_POST['reason']);

  $sql = "INSERT INTO blood_requests (name, blood_group, phone, city, hospital, reason, request_date)
          VALUES ('$name', '$blood_group', '$phone', '$city', '$hospital', '$reason', NOW())";

  if (mysqli_query($conn, $sql)) {
    $message = '<div class="alert alert-success mt-3">✅ Request submitted successfully! We will contact you soon.</div>';
  } else {
    $message = '<div class="alert alert-danger mt-3">❌ Error submitting request. Please try again later.</div>';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Need Blood Form - Blood Bank System">
  <meta name="author" content="Arideep Kanshabanik">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    body {
      background-color: #f7f7f7;
    }
    .form-container {
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin-top: 30px;
    }
    .btn-primary {
      background-color: #ff4d4d;
      border: none;
    }
    .btn-primary:hover {
      background-color: #e60000;
    }
  </style>
</head>

<body>
  <?php
  $active = 'need';
  include('head.php');
  ?>

  <div id="page-container" style="margin-top:50px; position: relative; min-height: 84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="form-container">
              <h2 class="text-center mb-4">🩸 Need Blood</h2>
              <p class="text-center">Fill in your details below and we’ll connect you with available donors.</p>
              <hr>

              <?php echo $message; ?>

              <form method="POST" action="">
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                  <label for="blood_group">Blood Group</label>
                  <select class="form-control" id="blood_group" name="blood_group" required>
                    <option value="">Select Blood Group</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>O+</option>
                    <option>O-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="phone">Contact Number</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your mobile number" required>
                </div>

                <div class="form-group">
                  <label for="city">City / Area</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city or area" required>
                </div>

                <div class="form-group">
                  <label for="hospital">Hospital Name</label>
                  <input type="text" class="form-control" id="hospital" name="hospital" placeholder="Enter hospital name" required>
                </div>

                <div class="form-group">
                  <label for="reason">Reason / Comments</label>
                  <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Reason for blood request" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit Request</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
</body>
</html>
