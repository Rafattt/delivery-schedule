<?php
$con = mysqli_connect(/*"database address"*/,/*"user name"*/,/*"password"*/,/*"database name"*/);
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 ?>