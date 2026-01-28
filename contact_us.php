<?php
include 'conn.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $msg = mysqli_real_escape_string($conn, $_POST['message']);

  $sql = "INSERT INTO contact_queries (name, email, phone, message, submitted_on)
          VALUES ('$name', '$email', '$phone', '$msg', NOW())";

  if (mysqli_query($conn, $sql)) {
    $message = '<div class="alert alert-success mt-3">✅ Message sent successfully! We will contact you soon.</div>';
  } else {
    $message = '<div class="alert alert-danger mt-3">❌ Something went wrong. Please try again.</div>';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Contact Blood Bank Management System">
  <meta name="author" content="Arideep Kanshabanik">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    :root {
      --accent-red: #d32f2f;
      --accent-dark: #b71c1c;
      --light-gray: #fafafa;
    }
    body {
      background-color: #f7f7f7;
    }
    #page-container {
      margin-top: 50px;
      position: relative;
      min-height: 84vh;
    }
    .contact-title {
      color: var(--accent-dark);
      font-weight: 700;
      margin-bottom: 20px;
    }
    .form-container {
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .btn-primary {
      background-color: var(--accent-red);
      border: none;
    }
    .btn-primary:hover {
      background-color: var(--accent-dark);
    }
    .contact-details {
      background: var(--light-gray);
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    @media (max-width: 767.98px) {
      .contact-details { margin-top: 25px; }
    }
  </style>
</head>

<body>
<?php 
$active = 'contact';
include 'head.php'; 
?>

<div id="page-container">
  <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">
      <h1 class="mt-4 mb-3 contact-title">Contact Us</h1>

      <div class="row">
        <!-- LEFT SIDE: Contact Form -->
        <div class="col-lg-8 mb-4">
          <div class="form-container">
            <h4 class="mb-3">Send us a Message</h4>
            <p class="text-muted">Fill in your details below and we’ll get back to you soon.</p>
            <hr>

            <?php echo $message; ?>

            <form method="POST" action="">
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
              </div>

              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
              </div>

              <div class="form-group">
                <label for="phone">Contact Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your mobile number" required>
              </div>

              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Type your message here..." required></textarea>
              </div>

              <button type="submit" class="btn btn-primary btn-block">Submit Message</button>
            </form>
          </div>
        </div>

        <!-- RIGHT SIDE: Contact Details -->
        <div class="col-lg-4 mb-4">
          <div class="contact-details">
            <h4>Contact Details</h4>
            <?php
              $sql = "SELECT * FROM contact_info";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
              <p><strong>Address:</strong> <?php echo $row['contact_address']; ?></p>
              <p><strong>Contact Number:</strong> <?php echo $row['contact_phone']; ?></p>
              <p><strong>Email:</strong> 
                <a href="mailto:<?php echo $row['contact_mail']; ?>"><?php echo $row['contact_mail']; ?></a>
              </p>
            <?php 
                }
              } 
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>
</div>
</body>
</html>
