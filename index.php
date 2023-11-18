<?php include 'config/database.php';

if(isset($_POST['submit'])){

    $Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['sign_password']);
    $cpass = md5($_POST['sign_cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist';
    }
    else{
        if($pass  != $cpass){
            $error[] = 'password not matched!';
        }
        else{
            $insert = "INSERT INTO user_form(Fname, Lname, email, password, user_type) VALUES('$Fname','$Lname','$email','$pass','$user_type')";
            mysqli_query($conn, $insert); 
        }
    }

};

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
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
        </div>
        <script src="scripts/script.js"></script>
    </body>
</html>