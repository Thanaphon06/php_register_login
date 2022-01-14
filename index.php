<?php 

    session_start();
        if(!isset($_SESSION['username'])){
            $_SESSION['msg'] = "pai login ekuy";
            header('location: login.php');
        }

        if (isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['username']);
            header('locattion: login.php');

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        /* Basic styles */
*,
*::before,
*::after {
  box-sizing: border-box;
}

:root{
    --bg-color: #D8D8D8;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  width: 100vw;
  height: 100vh;
  color: #000;
  background-color: var(--bg-color);
  font-family: 'Maitree', serif;
}

h1{
    font-size: 3em;
    font-weight: normal;
}

/* title styles */
.home-title span{
    position: relative;
    overflow: hidden;
    display: block;
    line-height: 1.2;
}

.home-title span::after{
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: white;
    animation: a-ltr-after 2s cubic-bezier(.77,0,.18,1) forwards;
    transform: translateX(-101%);
}

.home-title span::before{
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: var(--bg-color);
    animation: a-ltr-before 2s cubic-bezier(.77,0,.18,1) forwards;
    transform: translateX(0);
}

.home-title span:nth-of-type(1)::before,
.home-title span:nth-of-type(1)::after{
    animation-delay: 1s;
}

.home-title span:nth-of-type(2)::before,
.home-title span:nth-of-type(2)::after{
    animation-delay: 1.5s;
}

@keyframes a-ltr-after{
    0% {transform: translateX(-100%)}
    100% {transform: translateX(101%)}
}

@keyframes a-ltr-before{
    0% {transform: translateX(0)}
    100% {transform: translateX(200%)}
}
    </style>
</head>
<body>
</div>
    <div class="content">
        <?php if (isset($_SESSION['success'])) :?>
            <div class="success">

                <h3>

                    <?php
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                    ?>

                </h3>

            </div>    
        <?php endif ?>
    

        <?php if (isset($_SESSION['username'])) : ?>
            <!--<p>welcome <strong><?php echo $_SESSION ['username'];  ?></strong></p>-->
            <h1 class="home-title">
            <span>welcome <strong><?php echo $_SESSION ['username'];  ?></span>
            <span>You finally awake</span>
            </h1>
            <p><a href="index.php?logout='1'" style="color:crimson;">logout</a></p>
            <?php endif ?>

    </div>
</body>
</html>