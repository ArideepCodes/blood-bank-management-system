<?php
session_start();
include('conn.php');
include('header.php');
$active = "managepages";
include('sidebar.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  echo "<div class='alert alert-danger'>Please login first.</div>";
  exit;
}

$msg = "";

if (isset($_POST['update'])) {
  $page_id = $_POST['page_id'];
  $content = $_POST['content'];

  $sql = "UPDATE pages SET Description=? WHERE id=?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "si", $content, $page_id);
  if (mysqli_stmt_execute($stmt)) {
    $msg = "Page updated successfully!";
  } else {
    $msg = "Error updating page: " . mysqli_error($conn);
  }
}

$result = mysqli_query($conn, "SELECT * FROM pages");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Pages</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    body { color: black; background: #f8f9fa; }
    .page-box { background: white; border-radius: 8px; padding: 20px; margin-bottom: 20px; }
    textarea { width: 100%; height: 200px; }
    .update-btn { background-color: #c9302c; color: white; border: none; padding: 10px 20px; border-radius: 5px; }
  </style>
</head>
<body>
<div id="content" style="margin-left:210px; padding:20px;">
  <h2>Manage Pages</h2>
  <hr>
  <?php if ($msg) echo "<div class='alert alert-info'>$msg</div>"; ?>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="page-box">
      <h4><?php echo htmlentities($row['PageTitle']); ?></h4>
      <form method="post">
        <input type="hidden" name="page_id" value="<?php echo $row['id']; ?>">
        <textarea name="content"><?php echo htmlentities($row['Description']); ?></textarea><br>
        <button type="submit" name="update" class="update-btn">Update Page</button>
      </form>
    </div>
  <?php } ?>
</div>
</body>
</html>
