<?php
require 'PHPMailer/PHPMailerAutoload.php';
  $db = mysqli_connect("localhost", "root", "", "wtproject");
  if (isset($_POST['upload'])) {
    $aadar = mysqli_real_escape_string($db, $_POST['aadarno']);

    $em = mysqli_real_escape_string($db, $_POST['email']);
    $place = mysqli_real_escape_string($db, $_POST['place']);
    $det = mysqli_real_escape_string($db, $_POST['detail']);
  $yr=(integer)$_POST['year'];
  $mo=(integer)$_POST['month'];
  $da=(integer)$_POST['day'];
  $mysqldate=sprintf("%04d-%02d-%04d", $yr, $mo, $da);
//echo "$mysqldate";

  $sql2 = "SELECT officer_id,email_id from  officer WHERE city='".$place."' LIMIT 1";
  $result = mysqli_query($db, $sql2);
  //echo $result;
  $row=mysqli_fetch_assoc(mysqli_query($db,$sql2));
  $id=$row['officer_id'];
  //echo $em;

  $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPSecure = 'tls';
      $mail->SMTPAuth = true;
      $mail->Username = '';
      $mail->Password = '';
      $mail->addAddress($em);
      $mail->Subject = 'COMPLAINT REGISTRATION CONFIRMATION';
      $mail->msgHTML("This is to inform you that your requst has been processed<br> i.e is your complaint is registered and<b> Officer with id :<h2>$id<h2> has been assigned to your case.");
      $mail->isHTML(true);
      if (!$mail->send()) {
      $error = "Error: " . $mail->ErrorInfo;
      echo '<p id="para">'.$error.'</p>';
      }
      else {
      echo '<p id="para">Verification otp sent!</p>';
      }

  echo mysqli_errno($db);
  echo $em;
  //echo "<h3>Your case has been assigned to officer id:".$id." Jai hind";
  //$msg="Don't worry bud...Your case has been assigned to officer having id: ".$id;
  //$sub=$id;  
    $sql = "INSERT INTO complaint (time_c,place,details,officer_id,aadar_no) VALUES('$mysqldate','$place','$det','$id','$aadar')";
    mysqli_query($db, $sql);

    $sql3="SELECT * FROM complaint WHERE complaint_id = LAST_INSERT_ID()";
    $row1=mysqli_fetch_assoc(mysqli_query($db,$sql3));
    $n=$row1['complaint_id'];
    $mail1 = new PHPMailer;
    $mail1->isSMTP();
    $mail1->Host = 'smtp.gmail.com';
    $mail1->Port = 587;
    $mail1->SMTPSecure = 'tls';
    $mail1->SMTPAuth = true;
    $mail1->Username = '';
    $mail1->Password = '';
    $mail1->addAddress($em);
    $mail1->Subject = 'A NEW CRIME TOOK PLACE IN YOUR AREA';
    $mail1->msgHTML("A new crime took place in your suburb and the required complaint id is:<h2>$n</h2>");
    $mail1->isHTML(true);
    if (!$mail1->send()) {
    $error = "Error: " . $mail1->ErrorInfo;
    echo '<p id="para">'.$error.'</p>';
    }
    else {
    echo '<p id="para">Verification otp sent!</p>';
    }
  }
?>
<!DOCTYPE HTML>
<html>
<?php include 'header.php';?>
<link rel="stylesheet" type="text/css" href="complaint.css">
<body>
<h1>FILE A COMPLAINT</h1>
<a href="wellcome2.php"><button type="button" class="btn btn-primary">View Complaints</button></a>
<form action="complaint.php" method="post" class="main">
<h1 class="sub">PERSONAL DETAILS</h1>
   <div class="form-group">
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Aadar_Number" name="aadarno" >
  </div>
   <div class="form-group">
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" name="email" >
  </div>
  <h1 class="sub">CRIME DETAILS</h1>
   <div class="form-group">
    <label class="label">Day</label>
<input class="insert" type="text" name="day" required placeholder="Day">
<br>
<label class="label">Month</label>
<input class="insert" type="text" name="month" required placeholder="Month">
<br>
<label class="label">Year</label>
<input class="insert" type="text" name="year" required placeholder="Year">
<br>
  </div>
   <div class="form-group">
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Place" name="place" >
  </div>
   <div class="form-group">
<textarea type="text" class="form-control" id="formGroupExampleInput" placeholder="Description" name="detail" ></textarea>
  </div>
 <br> <center><button type="submit" name="upload" class="btn btn-primary">Submit</button></center>
  </form>
</html>