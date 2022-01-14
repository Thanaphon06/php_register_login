<?php
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        if(empty($username)){
            array_push($errors, "username is ahhh");
        }
        if(empty($password)){
            array_push($errors, "password is ahhh");
        }

        if(count($errors) == 0){
            $password = md5($password);
            $query  =   "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You finnaly here";
                header("location: index.php");
            } else {
                array_push($errors, "Wrong way try again");
                $_SESSION['error'] = "Wrong way";
                header("location: login.php");
            }

        }
    }

?>