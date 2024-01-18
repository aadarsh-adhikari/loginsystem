<?php
    $error = false ;
    $sucessfull =false;
    $exists =false;
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    include "connect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $existssql = "SELECT * FROM  `users`WHERE username = '$username' ";
    $result = mysqli_query($conn , $existssql);
    $numexitsrow =mysqli_num_rows($result);
    if($numexitsrow > 0){
        $exists =true;
    }
    else{
        $exists =false;
        if(($password ==$cpassword) ){
            $hash = password_hash($password , PASSWORD_DEFAULT);
            $sql ="INSERT INTO `users` (`username`, `password`, `date`) VALUES ( '$username', '$hash', current_timestamp()) ";
            $result = mysqli_query($conn ,$sql);
            if($result){
             $sucessfull =true;
             header("Location: login.php");
             exit();
            }
        }
         else {
        $error = true;
         }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            
        }
        
        .flex{
            display:flex;
            justify-content:center;
            align-content:center;
            margin-top:100px;
        }
        .signup-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px 2px rgb(0 0 0 / 40%);
            width: 300px;
        }

        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .signup-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .signup-form button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .signup-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php 
    require "nav.php"
    ?>
    <?php
    if($exists){
        echo"<h1> username exits</h1>";
    }
    if($error){
        echo "<h1>password doesnot matches";
    }
    ?>
   <div class="flex">
   <div class="signup-container">
        <h2>Sign Up</h2>
        <form class="signup-form" action="signup.php" method="post">
            <input type="text" name="username" maxlength="50" placeholder="Username" required>
            <input type="password" name="password" maxlength="50" placeholder="Password" required>
            <input type="password" name="cpassword" maxlength="50" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>
   </div>

</body>
</html>
