
<?php
    $error = false ;
    $login =false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "connect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];   
    $sql = "SELECT * FROM  `users` WHERE username = '$username'";
    $result = mysqli_query($conn , $sql);
    $numexitsrow =mysqli_num_rows($result);
    if($numexitsrow ==1){
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
            $login=true;
            session_start();
            $_SESSION['logedin'] =true;
            $_SESSION['username']= $username;
            header("Location: home.php");
            }
            else{
                $error =true;
            }

        }
     }
    else{
        $error = true;
         }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
        }
        .flex{
            display:flex;
            justify-content:center;
            align-content:center;
            margin-top:100px;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px 2px rgb(0 0 0 / 40%);
            width: 300px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php 
    require "nav.php"
    ?>
   <?php
   if($error){
    echo "something is wrong";
   }
   ?>
    <div class="flex">
          <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
    </div>
</body>
</html>
