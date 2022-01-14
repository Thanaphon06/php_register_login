<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register System</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    
    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                        echo $_SESSION['error'];
                        unset ($_SESSION['error']);
                    ?>
                </h3>
            </div>    
        <?php endif ?>
        <h3 id="logo">Register</h3>

  <label for="username">Username</label>
  <input type="text" id="username" name="username" placeholder="Type in your username.." autocomplete="off" required />

  <label for="password_1">Password</label>
  <input type="password" id="password_1" name="password_1" placeholder="Enter your password.." autocomplete="off" required />

  <label for="password_2">Password</label>
  <input type="password" id="password_2" name="password_2" placeholder="Enter your password again.." autocomplete="off" required />

  <label for="email">Password</label>
  <input type="email" id="email" name="email" placeholder="your email." autocomplete="off" required />

  
  <a class="register" href="login.php">Log in</a>

  <input type="submit" name="reg_user" class="btn" />
  
</form>
</body>
</html>