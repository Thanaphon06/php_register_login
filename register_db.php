<?php
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($username)) {
                array_push($errors, "username is mama mia");
        }
        if (empty($email)) {
                array_push($errors, "email is mama mia");
        }
         if (empty($password_1)) {
                array_push($errors, "password is mama mia");
        }
        if ($password_1 != $password_2) {
                array_push($errors, "password not the same");

        }


        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);
        if ($result) {
            if($result['username'] === $username){
                array_push($errors, "Ook pai law");
            }
            if($result['email'] === $email){
                array_push($errors, "email pai law");
            }
        }

        if(count($errors) == 0){
            $password = md5($password_1);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Yaeh ooAh";
            header('location: index.php');
        } else {
            array_push($errors, "username pai law");
                $_SESSION['error'] = "username or email";
                header("location: register.php");
        }
    }

?>