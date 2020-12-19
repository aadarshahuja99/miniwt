<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
  

</head>
<body >

<?php include 'header.php';?>
    
                    <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
                    ?>
<div class="content">
<h1>USER LOGIN</h1>
<form class="form" action="process2.php" method="post">
  <div class="form-group">
     <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">@</div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username" required name="UName">
  </div>
  </div>
  <br>
  <div class="form-group">
    <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text">#</div>
    </div>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="Password">
  </div>
  </div>
 <br>
<center><button type="submit" name="Login" class="btn btn-primary">Submit</button></center>
</form>
</div>
          
</body>
</html>