<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Donate Blood Form - Blood Bank System">
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
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }

    .btn-primary {
      background-color: #ff4d4d;
      border: none;
    }

    .btn-primary:hover {
      background-color: #e60000;
    }

    label {
      font-weight: 500;
    }

    h2 {
      font-weight: 600;
      color: #333;
    }
  </style>
</head>

<body>
  <?php
  $active = 'donate';
  include('head.php');
  ?>

  <div id="page-container" style="margin-top:50px; position: relative; min-height: 84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="form-container">
              <h2 class="text-center mb-4">❤️ Donate Blood</h2>
              <p class="text-center">Fill in your details below and become a hero by saving lives.</p>
              <hr>

              <form action="savedata.php" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Full Name <span style="color:red">*</span></label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter your full name" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Mobile Number <span style="color:red">*</span></label>
                    <input type="text" name="mobileno" class="form-control" placeholder="Enter your mobile number" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Email ID</label>
                    <input type="email" name="emailid" class="form-control" placeholder="Enter your email (optional)">
                  </div>

                  <div class="form-group col-md-3">
                    <label>Age <span style="color:red">*</span></label>
                    <input type="number" name="age" class="form-control" placeholder="Enter age" required>
                  </div>

                  <div class="form-group col-md-3">
                    <label>Gender <span style="color:red">*</span></label>
                    <select name="gender" class="form-control" required>
                      <option value="">Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Blood Group <span style="color:red">*</span></label>
                    <select name="blood" class="form-control" required>
                      <option value="" selected disabled>Select Blood Group</option>
                      <?php
                      include 'conn.php';
                      $sql = "SELECT * FROM blood";
                      $result = mysqli_query($conn, $sql) or die("Query unsuccessful.");
                      while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <option value="<?php echo $row['blood_group']; ?>"><?php echo $row['blood_group']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Address <span style="color:red">*</span></label>
                    <textarea class="form-control" name="address" rows="2" placeholder="Enter your address" required></textarea>
                  </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
</body>
</html>
