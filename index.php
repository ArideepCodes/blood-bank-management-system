<!DOCTYPE html>
<html lang="en">

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
    /* Carousel Fade Effect */
    .carousel-fade .carousel-item {
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }

    .carousel-fade .carousel-item.active,
    .carousel-fade .carousel-item-next.carousel-item-left,
    .carousel-fade .carousel-item-prev.carousel-item-right {
      opacity: 1;
    }

    .carousel-fade .carousel-item-next,
    .carousel-fade .carousel-item-prev,
    .carousel-fade .active.carousel-item-left,
    .carousel-fade .active.carousel-item-right {
      opacity: 0;
    }

    /* ✅ Fixed Carousel Images (no zooming on PC) */
    .carousel-item img {
      width: 100%;
      height: auto;
      max-height: 480px;
      object-fit: contain;
      background-color: #fff;
      padding: 10px;
    }

    @media (max-width: 768px) {
      .carousel-item img {
        object-fit: cover;
        height: 280px;
        padding: 0;
      }
    }

    /* Responsive Welcome Text */
    .welcome-text {
      text-align: center;
      font-size: 45px;
      font-weight: 600;
      line-height: 1.4;
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      .welcome-text {
        font-size: 26px;
        line-height: 1.3;
        padding: 0 10px;
      }
    }

    @media (max-width: 480px) {
      .welcome-text {
        font-size: 22px;
      }
    }

    /* Responsive Donor Cards */
    .donor-card {
      width: 100%;
      max-width: 300px;
      margin: 0 auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      min-height: 420px;
    }

    .donor-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .donor-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-bottom: 3px solid #f44336;
    }

    @media (max-width: 768px) {
      .donor-card {
        max-width: 90%;
      }

      .donor-img {
        height: 160px;
      }

      .donor-card .card-body {
        padding: 10px;
      }

      .donor-card h3 {
        font-size: 20px;
      }

      .donor-card p {
        font-size: 15px;
      }
    }
  </style>
</head>

<body>
  <div class="header">
    <?php
    $active = "home";
    include('head.php');
    ?>
  </div>

  <?php include 'ticker.php'; ?>

  <div id="page-container" style="margin-top:50px; position: relative; min-height: 84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:75px;">

        <!-- Carousel Section -->
        <div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
          </ul>

          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="image/Slide1.png" alt="Blood Donation Awareness">
            </div>
            <div class="carousel-item">
              <img src="image/Slide2.png" alt="Donate Blood Save Lives">
            </div>
          </div>

          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>

        <br>
        <h1 class="welcome-text">
          Welcome to Blood Bank & Donor Management System <br>
          Made By Students Of SVU Department Of CSE
        </h1>
        <br>

        <!-- Info Cards -->
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header bg-info text-white">The Need for Blood</h4>
              <p class="card-body overflow-auto" style="padding-left:2%;height:120px;text-align:left;">
                <?php
                include 'conn.php';
                $sql = "select * from pages where page_type='needforblood'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }
                ?>
              </p>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header bg-info text-white">Blood Tips</h4>
              <p class="card-body overflow-auto" style="padding-left:2%;height:120px;text-align:left;">
                <?php
                $sql = "select * from pages where page_type='bloodtips'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }
                ?>
              </p>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header bg-info text-white">Who You Could Help</h4>
              <p class="card-body overflow-auto" style="padding-left:2%;height:120px;text-align:left;">
                <?php
                $sql = "select * from pages where page_type='whoyouhelp'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }
                ?>
              </p>
            </div>
          </div>
        </div>

        <!-- Donor List -->
        <h2>Blood Donor Names</h2>
        <div class="row" id="donor-container">
          <?php
          $sql = "SELECT * FROM donor_details 
                  JOIN blood ON donor_details.donor_blood = blood.blood_group 
                  ORDER BY rand()";
          $result = mysqli_query($conn, $sql);
          $count = 0;
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $count++;
              $style = ($count > 2) ? 'style="display:none;"' : '';
          ?>
              <div class="col-lg-4 col-sm-6 portfolio-item mb-4 donor-card-wrap" <?php echo $style; ?>>
                <div class="card donor-card">
                  <img class="card-img-top donor-img" src="image/blood_drop_logo.jpg" alt="Donor Image">
                  <div class="card-body">
                    <h3 class="card-title text-center"><?php echo $row['donor_name']; ?></h3>
                    <p class="card-text">
                      <b>Blood Group:</b> <?php echo $row['blood_group']; ?><br>
                      <b>Mobile No.:</b> <?php echo $row['donor_number']; ?><br>
                      <b>Gender:</b> <?php echo $row['donor_gender']; ?><br>
                      <b>Age:</b> <?php echo $row['donor_age']; ?><br>
                      <b>Address:</b> <?php echo $row['donor_address']; ?><br>
                    </p>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        </div>

        <div class="text-center mt-3">
          <button id="toggleBtn" class="btn btn-danger" onclick="toggleDonors()">View All</button>
        </div>

        <br>

        <!-- Blood Groups -->
        <div class="row">
          <div class="col-lg-6">
            <h2>BLOOD GROUPS</h2>
            <p>
              <?php
              $sql = "select * from pages where page_type='bloodgroups'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo $row['page_data'];
                }
              }
              ?>
            </p>
          </div>
          <div class="col-lg-6">
            <img class="img-fluid rounded" src="image/blood_donationcover.jpeg" alt="Blood Donation Cover">
          </div>
        </div>

        <hr>

        <!-- Universal Donors -->
        <div class="row mb-4">
          <div class="col-md-8">
            <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
            <p>
              <?php
              $sql = "select * from pages where page_type='universal'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo $row['page_data'];
                }
              }
              ?>
            </p>
          </div>
          <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="donate_blood.php" style="background-color:#7FB3D5;color:#273746;">Become a Donor</a>
          </div>
        </div>

      </div>
    </div>

    <?php include('footer.php'); ?>
  </div>

  <script>
    let expanded = false;

    function toggleDonors() {
      const donors = document.querySelectorAll('#donor-container .donor-card-wrap');
      const btn = document.getElementById('toggleBtn');

      if (!expanded) {
        donors.forEach(d => {
          d.style.display = 'block';
          d.style.opacity = 0;
          d.style.transition = 'opacity 0.4s ease';
          setTimeout(() => d.style.opacity = 1, 50);
        });
        btn.innerText = "View Less";
        expanded = true;
      } else {
        donors.forEach((d, index) => {
          if (index >= 2) d.style.display = 'none';
        });
        btn.innerText = "View All";
        expanded = false;
      }
    }
  </script>

</body>
</html>
