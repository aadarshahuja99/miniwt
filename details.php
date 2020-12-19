<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "wtproject");

  $result = mysqli_query($db, "SELECT * FROM criminal");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Details</title>
<link rel="stylesheet" type="text/css" href="prototype.css">
</head>
<body>
<nav class="topnav">
<a href="prototype.html">HOME</a>
<a href="#">OUR WORK</a>
<a href="complaint.html">FILE COMPLAINT</a>
<a href="#">ABOUT US</a>
<a href="new.html">ADD NEW RECORD</a>
<a href="login.html" id="right">LOGIN</a>
</nav>
<h1 class="secondpage">CRIMINAL RECORDS</h1>
<div class="whole">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div class='criminal'>";
      	echo "<img src='images/".$row['photo_c']."' >";
      	echo "<p>".$row['fname_c']." ".$row['lname_c']."</p>";
      echo "</div>";
    }
  ?>
  </div>
</body>
</html>