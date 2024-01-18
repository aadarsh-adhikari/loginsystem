<?php
session_start();
if (!isset($_SESSION['logedin']) ||$_SESSION['logedin'] != true){
    header("Location: signup.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Site</title>

</head>
<body>
  <?php
  include "nav.php";
  ?>
    <p>WELCOME <?php echo $_SESSION['username'] . ", hope you will enjoy our website" ;?></P>
</body>
</html>
