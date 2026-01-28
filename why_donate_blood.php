<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    :root {
      --accent-red: #b71c1c;
      --light-gray: #fafafa;
    }

    body {
      background: var(--light-gray);
      color: #333;
    }

    h1 {
      color: var(--accent-red);
      font-weight: 700;
      font-size: 2.2rem;
    }

    p {
      font-size: 1rem;
      line-height: 1.6;
    }

    #page-container {
      margin-top: 50px;
      position: relative;
      min-height: 84vh;
    }

    .why-section {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
      padding: 40px 25px;
    }

    .why-img {
      max-width: 90%;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      object-fit: contain;
    }

    @media (max-width: 767.98px) {
      .why-section {
        padding: 25px 15px;
      }
      h1 {
        font-size: 1.8rem;
      }
      .why-img {
        max-width: 100%;
      }
    }
  </style>
</head>

<body>
<?php 
$active = 'why';
include('head.php');
?>

<div id="page-container">
  <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">
      <div class="why-section">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
          <div class="col-lg-6">
            <h1 class="mt-3 mb-4">Why Should I Donate Blood?</h1>
            <p>
              <?php
                include 'conn.php';
                $sql = "SELECT * FROM pages WHERE page_type='donor'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }
              ?>
            </p>
          </div>

          <div class="col-lg-6 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
            <img class="img-fluid why-img" 
                 src="image/Why_donate_blood.png" 
                 alt="Why Donate Blood Poster">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('footer.php'); ?>
</div>
</body>
</html>
