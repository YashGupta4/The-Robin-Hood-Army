<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin";

$conn = mysqli_connect($servername, $username, $password, $database);

$sn = $_GET['sn'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$em = $_GET['em'];
$sub = $_GET['sub'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/cssadmin.css">

  <title>Admin Panel</title>
</head>

<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <img src="img/logo.png">
    <ul class="links">
      <li><a href="#">Home</a></li>
      <li><a href="#">Donations</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contacts</a></li>
      <li><a href="#">Login</a></li>
    </ul>
    </div>
  </nav>
  <br><br><br><br>
  <div class="container">
    <form action="" method="GET">
      <input type="hidden" value="<?php echo "$sn" ?>" id="sno" name="sno"><br><br>

      <label for="first_name">First Name</label>
      <input type="text" value="<?php echo "$fn" ?>" id="first_name" name="first_name" placeholder="Your name.."><br><br>

      <label for="last_name">Last Name</label>
      <input type="text" value="<?php echo "$ln" ?>" id="last_name" name="last_name" placeholder="Your last name.."><br><br>

      <label for="email">Email-Id</label>
      <input type="text" value="<?php echo "$em" ?>" id="email" name="email" placeholder="Email-id..." required><br><br>

      <label for="subject">Subject</label>
      <input type="text" value="<?php echo "$sub" ?>" id="subject" name="subject" placeholder="Volunteers information..."><br><br>

      <input type="submit" id="button" name="submit" value="Update">

    </form>
    <br><br>
  <footer>
    <div class="bottom">
      <center>
        <span class="credit">Created By ROBINHOOD ARMY</span>
        <span class="far fa-copyright"></span><span> 2021 All rights reserved.</span>
      </center>
    </div>
  </footer>
</body>

</html>

<?php
if (isset($_GET['submit'])) {
  $first_name = $_GET['first_name'];
  $last_name = $_GET['last_name'];
  $email = $_GET['email'];
  $subject = $_GET['subject'];
  $sno = $_GET['sno'];

  $sql = "UPDATE `admin` SET `sno` = '$sno',`first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `subject` = '$subject' WHERE `admin`.`sno` = '$sno'";
  $data = mysqli_query($conn, $sql);
  if ($data) {
    echo "<script>alert('Record Updated!')</script>";
?>
    <META http-equiv="refresh" content="0; url=http://localhost/DSW/index.php">
<?php
  } else {
    echo "FAILED TO UPDATE!!";
  }
}
?>

