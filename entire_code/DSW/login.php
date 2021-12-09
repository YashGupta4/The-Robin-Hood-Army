<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin";
$login=false;
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
  }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql="Select * from login where username='$username' AND password='$password'";
    $result= mysqli_query($conn,$sql);
    $num  = mysqli_num_rows($result);
    if($num==1){
        $login =true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location:index.php");
    }
    else{
        echo "Password or username entered is wrong.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login | RobinHood Army</title>
</head>
<body>
    <div class="container">
        <form class="login" method="post">
            <h2>Login</h2>
            <fieldset>
                <legend>Username</legend>
                <input type="text" name="username" id="username">
            </fieldset>
            <fieldset>
                <legend>Password</legend>
                <input type="password" name="password" id="password">
            </fieldset>
            <input type="submit" value="Sign in"><br>
            <span><a href="Home.html">← Back to Home</a></span>  
        </form>
    </div>
    <footer>
        <div class="bottom">
            <center>
              <span class="credit">Created By ROBINHOOD ARMY | </span>
              <span class="far fa-copyright"></span><span> 2021 All rights reserved.</span>
            </center>
          </div>
    </footer>
    
</body>
</html>