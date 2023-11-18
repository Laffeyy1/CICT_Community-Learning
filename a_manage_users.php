<?php
session_start();
include 'config/database.php';
$sql = 'SELECT * FROM user_form WHERE user_type in ("student" ,"professor") AND verify = "1"';
$result = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

$fnam = $_SESSION['fname'];
$lnam = $_SESSION['lname'];
$rol = $_SESSION['user_type'];


if (isset($_POST['select']) && isset($_POST['uid'])) {
    $pos = $_POST['uid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $disp_d = '';

    $disp_u = '';
} else {
    $pos = "no selected row";
    $disp_u = 'disabled';
    $disp_d = '<p class="h5">Please select a row before updating.</p> <div class="modal-footer my-3">
    <button type="button" class="btn border" data-bs-dismiss="modal">Close</button>';
}

if (isset($_POST['submit'])) {

    $Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['sign_password']);
    $user_type = $_POST['user_type'];
    $verify = 1;

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exist.';
    } else {
        $insert = "INSERT INTO user_form(Fname, Lname, email, password, user_type,verify) VALUES('$Fname','$Lname','$email','$pass','$user_type','$verify')";

        mysqli_query($conn, $insert);
        $sel = $conn->query("SELECT * FROM user_form ORDER BY id DESC LIMIT 1");
        $res = $sel->fetch_assoc();
        $id = $res['id'];
        $alog = "INSERT INTO `activity_logs`(`name`, `action`) VALUES ('System','Created row id # $id')";
        mysqli_query($conn, $alog);

        $log = $fnam . " " . $lnam . " Created row id # ".$id;
        $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$rol','$log')";
        mysqli_query($conn, $ulog);
        header('location:a_manage_users.php');
    }
};

if (isset($_POST['submit_u'])) {

    $ui = $_POST['ud'];
    $uFname = mysqli_real_escape_string($conn, $_POST['ufname']);
    $uLname = mysqli_real_escape_string($conn, $_POST['ulname']);
    $uemail = mysqli_real_escape_string($conn, $_POST['uemail']);
    $upass = md5($_POST['usign_password']);
    $uuser_type = $_POST['uuser_type'];
    $error[] = 'Row updated';

    $insert = "UPDATE `user_form` SET `Fname`='$uFname',`Lname`='$uLname',`email`='$uemail',`password`='$upass',`user_type`='$uuser_type' WHERE id = '$ui'";
    mysqli_query($conn, $insert);

    $alog = "INSERT INTO `activity_logs`(`name`, `action`) VALUES ('System','Updated row id # $ui')";
    mysqli_query($conn, $alog);

    $log = $fnam . " " . $lnam . " Updated row id # ".$ui;
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$rol','$log')";
    mysqli_query($conn, $ulog);
    header('location:a_manage_users.php');
};

if (isset($_POST['submit_d'])) {

    $del = mysqli_real_escape_string($conn, $_POST['user_id']);

    $insert = "DELETE FROM `user_form` WHERE id = $del";
    mysqli_query($conn, $insert);

    $alog = "INSERT INTO `activity_logs`(`name`, `action`) VALUES ('System','Deleted row id # $del')";
    mysqli_query($conn, $alog);

    $log = $fnam . " " . $lnam . " Updated row id # ".$del;
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$rol','$log')";
    mysqli_query($conn, $ulog);
    header('location:a_manage_users.php');
};

if (isset($_GET['dashboard'])) {
  $log = "Go to Verify Post";
  $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$role','$log')";
  mysqli_query($conn, $ulog);
}
if (isset($_GET['valuser'])) {
  $log = "Go to Validate User";
  $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$rol','$log')";
  mysqli_query($conn, $ulog);
}
if (isset($_GET['manuser'])) {
  $log = "Go to Manage User";
  $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$rol','$log')";
  mysqli_query($conn, $ulog);
}
if (isset($_GET['report'])) {
  $log = "Go to Report";
  $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$rol','$log')";
  mysqli_query($conn, $ulog);
}
if (isset($_GET['userlogs'])) {
  $log = "Go to User Logs";
  $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$rol','$log')";
  mysqli_query($conn, $ulog);
}
if (isset($_GET['actlogs'])) {
  $log = "Go to Activity Logs";
  $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fnam','$lnam','$rol','$log')";
  mysqli_query($conn, $ulog);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-body border-bottom p-0 ps-5" id="navbarz">

        <!--Logo-->
        <div>
            <a class="navbar-brand" href="#">
                <img src="image/logo_black.png" height="80">
            </a>
        </div>

        <!--Nav-->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="a_home.php?home">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <!--Search-->
            <form class="d-flex w-50" id="sech">
                <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 " type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></button>
            </form>
        </div>

        <!--Notification-->
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                <i class="bi bi-bell-fill"></i>
            </a>
            <ul class="dropdown-menu" id="notif_drop">
                <li><a class="dropdown-item" href="#">Some Notification</a></li>
                <li><a class="dropdown-item" href="#">Some Notification</a></li>
                <li><a class="dropdown-item" href="#">Some Notification</a></li>
            </ul>
        </div>

        <!--Profile-->
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu" id="profile_drop">
                <li><a class="dropdown-item" href="a_dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="logout.php?logout">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="row" id="center_body">
        <div class="col-3">
            <nav class="sidebar bg-white pb-2">
                <div>
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple disabled text-dark" aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i>
                            <h5>Admin Dashboard</h5>
                        </a>
                        <a href="a_dashboard.php?dashboard" class="list-group-item list-group-item-action py-2 ripple"><span>Verify Post</span></a>
                        <a href="a_validate_users.php?valuser" class="list-group-item list-group-item-action py-2 ripple"><span>Validate Students/Professor</span></a>
                        <a href="a_manage_users.php?manuser" class="list-group-item list-group-item-action py-2 ripple bg-danger text-white"><span>Manage Users</span></a>
                        <a href="a_reports.php?report" class="list-group-item list-group-item-action py-2 ripple"><span>Report</span></a>
                        <div class="btn-group dropend ">
                            <button type="button" class="btn dropdown-toggle text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                Audit Trail
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="a_user_logs.php?userlogs">User Logs</a></li>
                                <li><a class="dropdown-item" href="a_activity_logs.php?actlogs">Activity Logs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col">
            <div class="container mt-3">
                <h5>Verify Post</h5>
            </div>
            <div class="container bg-white mt-4 py-2 rounded ">
                <div class="row">
                    <div class="col py-2">
                        <table class="table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php foreach ($posts as $item) :
                                $uid = $item['id'];
                            ?>
                                <tbody>
                                    <tr style="transform: rotate(0);" class="<?php if ($pos == $uid) {
                                                                                    echo 'bg-danger text-white';
                                                                                } ?>">
                                        <th scope="row"><?php echo $item['id'] ?></th>
                                        <td><?php echo $item['Fname'] ?></td>
                                        <td><?php echo $item['Lname'] ?></td>
                                        <td><?php echo $item['user_type'] ?></td>
                                        <td class="text-end w-25">
                                            <form method="post">
                                                <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                                                <input type="hidden" name="fname" value="<?php echo $item['Fname']; ?>">
                                                <input type="hidden" name="lname" value="<?php echo $item['Lname']; ?>">
                                                <input type="hidden" name="email" value="<?php echo $item['email']; ?>">
                                                <input type="hidden" name="pass" value="<?php echo $item['password']; ?>">
                                                <input type="hidden" name="role" value="<?php echo $item['user_type']; ?>">
                                                <input type="submit" name="select" class="btn border <?php if ($pos == $uid) {
                                                                                                            echo 'bg-danger text-white';
                                                                                                        } ?>" value="Select">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach ?>
                        </table>
                        <div class="col text-end">
                            <!-- Button trigger modal -->
                            <div class="text-start h5 text-danger">
                                <?php

                                if (isset($error)) {
                                    foreach ($error as $error) {
                                        echo $error;
                                    }
                                }

                                ?>
                            </div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create">
                                Create
                            </button>
                            <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#update" <?php echo $disp_u ?>>
                                Update
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete" <?php echo $disp_u ?>>
                                Delete
                            </button>

                            <!-- Modal -->
                            <!-- create modal -->
                            <div class="modal fade bd-example-modal-lg" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="msodal-body text-center p-3">
                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="form-group d-flex flex-column w-50">
                                                        <div class="form-floating">
                                                            <input type="text" name="Fname" id="fname" placeholder="Name" class="form-control border" required>
                                                            <label for="fname">First Name:</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex flex-column w-50">
                                                        <div class="form-floating">
                                                            <input type="text" name="Lname" id="lname" placeholder="Name" class="form-control border" required>
                                                            <label for="lname">Last Name:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group d-flex flex-column w-100">
                                                        <div class="form-floating">
                                                            <input type="email" name="email" class="form-control border" id="email" placeholder="Email">
                                                            <label>Email:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center my-2">
                                                    <div class="form-group d-flex flex-column w-50">
                                                        <div class="form-floating">
                                                            <input type="password" name="sign_password" class="form-control" id="pass" placeholder="Password">
                                                            <label>Password:</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex flex-column w-50">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="floatingSelectGrid" name="user_type" class="role" aria-label="Floating label select example">
                                                                <option value="" disabled selected>--Select Role--</option>
                                                                <option value="student">Student</option>
                                                                <option value="professor">Professor</option>
                                                            </select>
                                                            <label for="floatingSelectGrid">Role</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn border" data-bs-dismiss="modal">Cancel</button>
                                                    <input type="submit" name="submit" value="Create" class="btn btn-success">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- update modal -->
                            <div class="modal fade bd-example-modal-lg" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Update - ID # <?php $ud = $pos;
                                                                                                            echo $ud; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="msodal-body text-center p-3">
                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="form-group d-flex flex-column w-50">
                                                        <div class="form-floating">
                                                            <input type="text" name="ufname" id="fname" placeholder="Name" class="form-control border" value="<?php echo $fname ?>" required>
                                                            <label for="fname">First Name:</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex flex-column w-50">
                                                        <div class="form-floating">
                                                            <input type="text" name="ulname" id="lname" placeholder="Name" class="form-control border" value="<?php echo $lname ?>" required>
                                                            <label for="lname">Last Name:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group d-flex flex-column w-100">
                                                        <div class="form-floating">
                                                            <input type="email" name="uemail" class="form-control border" id="email" placeholder="Email" value="<?php echo $email ?>" required>
                                                            <label>Email:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center my-2">
                                                    <div class="form-group d-flex flex-column w-50">
                                                        <div class="form-floating">
                                                            <input type="password" name="usign_password" class="form-control" id="pass" placeholder="Password" required>
                                                            <label>Password:</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex flex-column w-50">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="floatingSelectGrid" name="uuser_type" class="role" aria-label="Floating label select example" required>
                                                                <option value="" disabled selected>--<?php echo $role ?>--</option>
                                                                <option value="student">Student</option>
                                                                <option value="professor">Professor</option>
                                                            </select>
                                                            <label for="floatingSelectGrid">Role</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="ud" value="<?php echo $ud; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn border" data-bs-dismiss="modal">Cancel</button>
                                                    <input type="submit" name="submit_u" value="Update" class="btn btn-warning">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- delete modal -->
                            <div class="modal fade bd-example-modal-lg" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Update - ID # <?php $udd = $pos;
                                                                                                                    echo $udd; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body text-center">
                                            <p class="h5">Are you sure you want to delete this user?</p> <br>
                                            <p class="h5 text-danger"><?php echo $udd . ' • ' . $fname . ' ' . $lname . ' • ' . $role; ?></p>
                                            <div class="modal-footer my-3">
                                                <button type="button" class="btn border" data-bs-dismiss="modal">Close</button>
                                                <form action="" method="post">
                                                    <input type="hidden" name="user_id" value="<?php echo $udd; ?>">
                                                    <input type="submit" name="submit_d" value="Delete" class="btn btn-danger">
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</body>

</html>