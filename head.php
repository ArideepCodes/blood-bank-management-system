<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Blood Bank Management System</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
/* ======================== */
/* HEADER STYLES */
/* ======================== */
.header {
  overflow: hidden;
  background-color: #333;
  width: 100%;
  padding: 10px 15px;
  color: #FF0404;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  box-sizing: border-box;
}

body {
  margin: 0;
  padding-top: 115px;
}

.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px 15px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
  font-weight: bold;
  transition: background 0.3s, color 0.3s;
}

.header a.logo {
  font-size: 24px;
  font-weight: bold;
  color: #FF0404;
  letter-spacing: 0.5px;
  line-height: 1.3em;
  max-width: 70%;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

a.act {
  background: linear-gradient(to right, #fd746c 0%, #ff9068 100%);
  color: white !important;
  border-radius: 25px;
}

.header-right {
  float: right;
}

/* HAMBURGER */
.menu-icon {
  display: none;
  cursor: pointer;
  float: right;
  padding: 10px;
}

.menu-icon div {
  width: 25px;
  height: 3px;
  background-color: white;
  margin: 5px 0;
}

/* ======================== */
/* RESPONSIVE */
/* ======================== */
@media screen and (max-width: 768px) {
  .header {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .menu-icon {
    display: block;
    position: absolute;
    top: 18px;
    right: 20px;
  }

  .header-right {
    display: none;
    width: 100%;
    background: #222;
    padding: 10px 0;
  }

  .header-right a {
    display: block;
    text-align: center;
    margin: 5px 0;
  }

  .header.responsive .header-right {
    display: block;
  }

  body {
    padding-top: 135px;
  }
}

/* ======================== */
/* MODAL */
/* ======================== */
.modal-header.bg-danger {
  background-color: #FF0404 !important;
  color: white;
}

.modal-dialog {
  max-width: 95%;
}

.modal-body {
  position: relative;
  height: 450px;
  padding: 0;
}

.modal-body iframe {
  width: 100%;
  height: 100%;
  border: 0;
}

#mapLoader {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #fff;
  z-index: 10;
}

@media (max-width: 480px) {
  .modal-body {
    height: 300px;
  }
}
</style>
</head>

<body>

<div class="header" id="myHeader">
  <a href="index.php" class="logo">Blood Bank Management System</a>

  <div class="menu-icon" onclick="toggleMenu()">
    <div></div><div></div><div></div>
  </div>

  <div class="header-right">
    <a href="about_us.php">About Us</a>
    <a href="why_donate_blood.php">Why Donate Blood</a>
    <a href="donate_blood.php">Become A Donor</a>
    <a href="need_blood.php">Need Blood</a>
    <a href="contact_us.php">Contact Us</a>
    <a href="#" id="nearestHospitalsLink">Nearest Hospitals</a>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="hospitalModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title">Hospitals Near You</h5>
        <button type="button" class="close text-white" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div id="mapLoader">
          <div class="spinner-border text-danger"></div>
          <span class="ml-2 text-danger font-weight-bold">Loading nearby hospitals...</span>
        </div>
        <iframe id="hospitalMap" loading="lazy" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<script>
function toggleMenu() {
  document.getElementById("myHeader").classList.toggle("responsive");
}

function isMobileDevice() {
  return window.innerWidth <= 768 || 'ontouchstart' in window || navigator.maxTouchPoints > 0;
}

function loadHospitalsMap() {
  const loader = document.getElementById("mapLoader");
  const iframe = document.getElementById("hospitalMap");

  loader.style.display = "flex";
  iframe.src = "";

  const fallback = setTimeout(() => {
    iframe.src = "https://www.google.com/maps/search/hospitals+near+me/";
    loader.style.display = "none";
  }, 3000);

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      pos => {
        clearTimeout(fallback);
        iframe.src = `https://www.google.com/maps?q=hospitals+near+${pos.coords.latitude},${pos.coords.longitude}&output=embed`;
        loader.style.display = "none";
      },
      () => {
        clearTimeout(fallback);
        iframe.src = "https://www.google.com/maps/search/hospitals+near+me/";
        loader.style.display = "none";
      },
      { timeout: 2500 }
    );
  }
}

document.getElementById("nearestHospitalsLink").addEventListener("click", e => {
  e.preventDefault();
  if (isMobileDevice()) {
    window.location.href = "https://www.google.com/maps/search/hospitals+near+me/";
  } else {
    $('#hospitalModal').modal('show');
  }
});

$('#hospitalModal').on('shown.bs.modal', loadHospitalsMap);
$('#hospitalModal').on('hidden.bs.modal', () => {
  document.getElementById("hospitalMap").src = "";
  document.getElementById("mapLoader").style.display = "none";
});
</script>

</body>
</html>
