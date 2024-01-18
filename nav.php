<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Site</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: aquamarine;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        nav a {
            text-decoration: none;
            color: #333;
            margin-left: 20px;
            font-weight: bold;
        }

        nav a:hover {
            color: #000;
        }
    </style>
</head>
<body>
    <nav>
        <div><!-- You can add a logo or site name here if needed --></div>
        <div>
        <?php
if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){
  $logedin =true;
}
else{
    $logedin =false;
}
      echo "<a href='home.php' class='Home'>Home</a>";
       if(!$logedin){
        echo "<a href='login.php' class='login'>Login</a>
        <a href='signup.php' class='signup'>Sign Up</a>";
        
       }           
            if($logedin){
                echo "<a href='logout.php' class='logout'>logout</a>";

            };
            ?>

        </div>
    </nav>
</body>
</html>
