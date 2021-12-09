<?php

//INSERT INTO `admin` (`sno`, `first_name`, `last_name`, `subject`) VALUES (NULL, 'Aadya', 'aa', 'This is the first ');
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Sorry we failed to connect: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];

  $sql = "INSERT INTO `admin` (`sno`, `first_name`, `last_name`,`email`,`subject`) VALUES (NULL, '$first_name', '$last_name', '$email','$subject')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $insert = true;
  } else {
    echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 70%;
    }

    #customers td,
    #customers th {
      border: 1px solid black;
      padding: 8px;
    }
    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #2c3e50;
      color: white;
    }
  </style>
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

  <script>
    function checkdel() {
      return confirm('Are you sure you want to delete this record?');
    }
  </script>
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
      <li><a href="index.php">Donations</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="contact.php">Contacts</a></li>
      <li><a href="Home.html">Logout</a></li>
    </ul>
    </div>
  </nav>
  <br><br><br><br>
  <div class="container">
    <form action="/DSW/index.php" method="post">

      <label for="first_name">First Name</label>
      <input type="text" id="first_name" name="first_name" placeholder="Your name.."><br><br>

      <label for="last_name">Last Name</label>
      <input type="text" id="last_name" name="last_name" placeholder="Your last name.."><br><br>

      <label for="email">Email-Id</label>
      <input type="text" id="email" name="email" placeholder="Email-id..." required><br><br>

      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea><br><br>

      <input type="submit" value="Submit">

    </form>
  </div>
  <br><br>

  <table id="customers">
    <tr>
      <th>Sno.</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email-Id</th>
      <th>Subject</th>
      <th>Actions</th>
    </tr>
    <?php
    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $sno = $sno + 1;
      echo "
    <tr>
      <td>" . $sno . "</td>
      <td>" . $row['first_name'] . "</td>
      <td>" . $row['last_name'] . "</td>
      <td>" . $row['email'] . "</td>
      <td>" . $row['subject'] . "</td>
      <td><button><a href = 'edit.php?sn=$row[sno] & fn=$row[first_name] & ln=$row[last_name] & em=$row[email] & sub=$row[subject]'>Edit</a></button><button> <a href = 'delete.php?sn=$row[sno]' onclick='return checkdel()'>Delete</a></button></td>
    </tr>";
    }
    ?>
  </table>
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