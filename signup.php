<?php include 'config/database.php';

if(isset($_POST['submit'])){

    $Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['sign_password']);
    $cpass = md5($_POST['sign_cpassword']);
    $user_type = $_POST['user_type'];
    $log = " Signup";

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exist.';
    }
    else{
        if($pass  != $cpass){
            $error[] = 'Password not matched';
        }
        else{
            $insert = "INSERT INTO user_form(Fname, Lname, email, password, user_type) VALUES('$Fname','$Lname','$email','$pass','$user_type')";
            mysqli_query($conn, $insert); 
            $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$Fname','$Lname','$user_type','$user_type$log')";
            mysqli_query($conn, $ulog);
            header('location:login.php');
        }
    }

};

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body onload="active_signup()">
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
            <div class="signup">
                <h1>Sign Up</h1>
                <form action="" method="post">
                <div class="error_pop">
                    <?php 

                        if(isset($error)){
                            foreach($error as $error){
                                echo $error;
                            }
                        }

                    ?>
                </div>
                    <div class="role">
                        <label>Sign up as: </label>
                        <select name="user_type" class="role" required>
                            <option value="" disabled selected>-- Please select a role --</option>
                            <option value="student">Student</option>
                            <option value="professor">Professor</option>
                        </select>
                    </div>
                    <div class="names">
                        <div class="nametxt_field">
                            <label >First Name:</label>
                            <input type="text" name="Fname" required>
                        </div>
                        <div class="nametxt_field">
                            <label >Last Name:</label>
                            <input type="text" name="Lname" required>
                        </div>
                    </div>
                    <div class="txt_field">
                        <label >Email:</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="txt_field">
                        <label >Password:</label>
                        <input type="password" name="sign_password" required>
                    </div>
                    <div class="txt_field">
                        <label >Confirm Password:</label>
                        <input type="password" name="sign_cpassword" required>
                    </div>
                    <div class="remember">
                        <input type="checkbox" required>I Agree to Terms of Service
                    </div>
                    <div class="remember">
                        <input type="checkbox" required>I Agree to Data Privacy Policy
                    </div>
                    <input type="submit" name="submit" value="Sign Up">
                    <div class="have_account">Already have an account? <a href="login.php">LOGIN</a></div>
                </form>
            </div>
        </div>
        <script src="scripts/script.js"></script>
    </body>
</html>