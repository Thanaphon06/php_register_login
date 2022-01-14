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
    <title>login System</title>
    
    <link rel="stylesheet" href="design.css">
</head>
<body>
    

    <form action="login_db.php" method="post">

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
  <h3 id="logo">Log In</h3>

  <label for="username">Username</label>
  <input type="text" id="username" name="username" placeholder="Type in your username.." autocomplete="off" required />

  <label for="password">Password</label>
  <input type="password" id="password" name="password" placeholder="Enter your password.." autocomplete="off" required />

  
  <a class="register" href="register.php">Register</a>

  <input type="submit" name="login_user" class="btn" />
</form>
</form>
</body>
</html>