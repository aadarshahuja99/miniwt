<?php

    $con=mysqli_connect('localhost','root','','wtproject');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>