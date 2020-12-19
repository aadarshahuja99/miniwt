<?php
  $db = mysqli_connect("localhost", "root", "", "wtproject");
  $msg = "";
  if (isset($_POST['upload'])) {
    $fn = mysqli_real_escape_string($db, $_POST['fname_u']);
    $ln = mysqli_real_escape_string($db, $_POST['lname_u']);
    
   echo mysqli_errno($db);
 
    $target = "citizens/".basename($image);
    $sql = "UPDATE complaint set status='".$ln."' WHERE complaint_id='".$fn."'";
    mysqli_query($db, $sql);
  }
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
<h1>Update Status</h1>
<form action="change.php" method="POST" class="main" enctype="multipart/form-data">
 <div class="form-group">
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Complaint_id" name="fname_u" >
  </div>
   <div class="form-group">
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Status" name="lname_u" >
  </div>
 
 <br> <center><button type="submit" name="upload" class="btn btn-primary">Submit</button></center>
  </form></body>
</html>