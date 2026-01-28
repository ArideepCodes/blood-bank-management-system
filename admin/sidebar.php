<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style>
body {
  margin: 0;
  font-family: 'Averia Gruesa Libre';
  font-size: 15px;
  color: #F8F9F9;
}

/* Sidebar Styling */
.sidebar {
  margin: 0;
  padding: 0;
  width: 210px;
  background-color: #333333;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-weight: bold;
  transition: 0.3s;
  border-radius: 6px;
}

.sidebar a:hover:not(.act) {
  background-color: #555;
  color: white;
}

/* Active Menu Item */
a.act {
  background: linear-gradient(to right, #00C9FF 0%, #92FE9D 100%);
  color: black !important;
  border-radius: 10px;
}

/* Responsive Design */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>

<body>
<div class="sidebar"><b>

  <!-- Dashboard -->
  <a href="dashboard.php" <?php if($active=='dashboard') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Dashboard
  </a>

  <!-- Donor List -->
  <a href="donor_list.php" <?php if($active=='list') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Donor List
  </a>

  <!-- Blood Requests -->
  <a href="blood_request_list.php" <?php if($active=='blood_requests') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-tint"></span>&nbsp;&nbsp;Blood Requests
  </a>

  <!-- Contact Queries -->
  <a href="query.php" <?php if($active=='query') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;Check Contactus Query
  </a>

</b></div>
</body>
</html>
