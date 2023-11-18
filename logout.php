<?php
session_start();
include 'config/database.php';

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$user_type = $_SESSION['user_type'];
$uid = $_SESSION['uid'];
$status = $_SESSION['verify'];
$log = "Logout";

if (isset($_GET['logout'])) {

    if($user_type == 'student'){
        
        $rlog = "INSERT INTO `reports`(`user_type`, `activity`) VALUES ('$user_type','$log')";
        mysqli_query($conn, $rlog);

        $log = "Logout";
            
        $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$user_type','$log')";
        mysqli_query($conn, $ulog);
        header("location:index.php");
    }
    elseif($user_type == 'professor'){

        $rlog = "INSERT INTO `reports`(`user_type`, `activity`) VALUES ('$user_type','$log')";
        mysqli_query($conn, $rlog);

        $log = "Logout";
            
        $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$user_type','$log')";
        mysqli_query($conn, $ulog);
        header("location:index.php");
    }
    else{

            
        $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$user_type','$log')";
        mysqli_query($conn, $ulog);
        header("location:index.php");
    
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="">
<script>
    window.onload = function() {
    window.location.replace("index.php");
}
</script>
</body>

</html>