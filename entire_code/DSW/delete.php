<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "admin";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Sorry we failed to connect: " . mysqli_connect_error());
}
$sno= $_GET['sn'];
$query= "DELETE FROM `admin` WHERE `admin`.`sno` = '$sno'";
$result = mysqli_query($conn, $query);

if($result){
    echo "<script>Recorded deleted from database!</script>";
    ?>
    <META http-equiv="refresh" content="0; url=http://localhost/DSW/index.php">
    <?php
}
else{
    echo "<font color='red'>Recorded couldn't be deleted from database!";
}
?>