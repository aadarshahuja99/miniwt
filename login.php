<?php
  $db = mysqli_connect("localhost:3307", "root", "", "wtproject");
  $msg = "";
  if (isset($_POST['upload'])) {
    $fn = (integer)mysqli_real_escape_string($db, $_POST['username']);
    $ln = mysqli_real_escape_string($db, $_POST['password']);

    $target = "citizens/".basename($image);
    $sql = "SELECT password FROM citizen WHERE aadar_no=".$fn." LIMIT 1";
    $result=mysqli_query($db, $sql);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'header.php';?>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<div class="content">
<h1>LOGIN</h1>
<form class="form" action="login.php" method="post">
  <div class="form-group">
     <label class="sr-only" for="inlineFormInputGroupUsername2">Aadar Number</label>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">@</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username" required name="username">
  </div>
  </div>
  <br>
  <div class="form-group">
    <div class="input-group mb-2 mr-sm-2">
	<div class="input-group-prepend">
      <div class="input-group-text">#</div>
    </div>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="password">
  </div>
  </div>
 <br>
<center><button type="submit" class="btn btn-primary">Submit</button></center>
</form>
</div>
<?php include 'footer.php';?>
</html>



