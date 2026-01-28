<html>
<head>
<style>
/* ======================= */
/* BASE STYLES */
/* ======================= */
.blue {
  background: #347fd0;
}

.news {
  box-shadow: inset 0 -15px 30px rgba(10,4,60,0.4), 0 5px 10px rgba(10,20,100,0.5);
  width: 100%;
  height: 50px;
  margin-top: 0;
  overflow: hidden;
  border-radius: 4px;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: flex-start;
}

/* Label (Latest Updates) */
.news span:first-child {
  background-color: #F60F0F;
  color: #fff;
  width: 140px;
  min-width: 120px;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 16px;
  text-align: center;
  box-shadow: inset 0 -15px 30px rgba(0,0,0,0.4);
}

/* Marquee container */
.text1 {
  flex: 1;
  height: 100%;
  display: flex;
  align-items: center;
  overflow: hidden;
}

.text1 marquee {
  font: 16px 'Raleway', Helvetica, Arial, sans-serif;
  color: #fff;
  white-space: nowrap;
}

/* ======================= */
/* MOBILE FIXES */
/* ======================= */
@media screen and (max-width: 768px) {
  .news {
    flex-direction: column;
    height: auto;
    text-align: center;
    padding: 5px 0;
  }

  .news span:first-child {
    width: 100%;
    height: 35px;
    font-size: 15px;
    border-radius: 0;
  }

  .text1 {
    width: 100%;
    margin-top: 2px;
  }

  .text1 marquee {
    font-size: 14px;
    padding: 3px 0;
  }
}
</style>
</head>

<body>
<div class="news blue">
  <span>Latest Updates</span>
  <span class="text1">
    <marquee scrollamount="5">
      Every year, a massive blood donation camp is organized at Swami Vivekananda University. 
      ❤️ Come and be a part of this noble cause!
    </marquee>
  </span>
</div>
</body>
</html>
