<?php
include 'config/database.php';
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);


        if ($row['user_type'] == 'admin' && $row['verify'] == 1) {

            $_SESSION['fname'] = $row['Fname'];
            $_SESSION['lname'] = $row['Lname'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['uid'] = $row['id'];
            $fname = $row['Fname'];
            $lname = $row['Lname'];
            $role = $row['user_type'];
            $log = "Login";

            $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
            mysqli_query($conn, $ulog);
            header("location:a_home.php");
        } elseif ($row['user_type'] == 'professor' && $row['verify'] == 1) {
            $_SESSION['fname'] = $row['Fname'];
            $_SESSION['lname'] = $row['Lname'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['uid'] = $row['id'];
            $fname = $row['Fname'];
            $lname = $row['Lname'];
            $role = $row['user_type'];
            $log = "Login";

            $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
            mysqli_query($conn, $ulog);
            $rlog = "INSERT INTO `reports`(`user_type`, `activity`) VALUES ('$role','$log')";

            mysqli_query($conn, $rlog);
            header('location:home.php');
        } elseif ($row['user_type'] == 'student' && $row['verify'] == 1) {
            $_SESSION['fname'] = $row['Fname'];
            $_SESSION['lname'] = $row['Lname'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['uid'] = $row['id'];
            $fname = $row['Fname'];
            $lname = $row['Lname'];
            $role = $row['user_type'];
            $log = "Login";

            $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
            mysqli_query($conn, $ulog);

            $rlog = "INSERT INTO `reports`(`user_type`, `activity`) VALUES ('$role','$log')";
            mysqli_query($conn, $rlog);
            header('location:home.php');
        } elseif ($row['verify'] == 0) {
            $error[] = 'User not verified';
        } elseif ($row['verify'] == 2) {
            $error[] = 'User rejected';
        } else {
            $error[] = 'Incorrect email/password!';
        }
    } else {
        $error[] = 'User not found!';
    }
};

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body onload="active_login()">
    <div class="container">
        <div class="header">
            <nav>
                <ul class="nav_links">
                    <li><a href="i_about.php">About us</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                </ul>
            </nav>
        </div>

        <div class="login">
            <h1>Login</h1>

            <form action="" method="post">
                <div class="error_pop">
                    <?php

                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo $error;
                        }
                    }

                    ?>
                </div>
                <div class="txt_field">
                    <label>Email:</label>
                    <input type="text" name="email" required>
                </div>
                <div class="txt_field">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <div class="remember">
                    <input type="checkbox">Remember me?
                </div>
                <input type="submit" name="submit" value="Login">

                <div class="forgot_pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="need_account">Need an account? <a href="signup.php">SIGN UP</a></div>
            </form>
        </div>
    </div>
    <script src="scripts/script.js"></script>
</body>

</html>