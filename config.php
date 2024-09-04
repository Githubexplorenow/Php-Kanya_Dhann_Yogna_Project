<?php
 $localhost = "localhost";
 $db = "wecd";
 $root = "root";
 $password = "";
 $con = mysqli_connect($localhost, $root, $password, $db);
 if (!$con) {
   die("Connection failed: " . mysqli_connect_error());
 }
?>