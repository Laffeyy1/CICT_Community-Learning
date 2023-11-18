<?php
session_start();
include 'config/database.php';
$sql = 'SELECT * FROM activity_logs';
$result = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$role = $_SESSION['user_type'];

if (isset($_GET['dashboard'])) {
    $log = "Go to Verify Post";
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
    mysqli_query($conn, $ulog);
}
if (isset($_GET['valuser'])) {
    $log = "Go to Validate User";
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
    mysqli_query($conn, $ulog);
}
if (isset($_GET['manuser'])) {
    $log = "Go to Manage User";
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
    mysqli_query($conn, $ulog);
}
if (isset($_GET['report'])) {
    $log = "Go to Report";
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
    mysqli_query($conn, $ulog);
}
if (isset($_GET['userlogs'])) {
    $log = "Go to User Logs";
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
    mysqli_query($conn, $ulog);
}
if (isset($_GET['actlogs'])) {
    $log = "Go to Activity Logs";
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
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
                        <a href="a_manage_users.php?manuser" class="list-group-item list-group-item-action py-2 ripple"><span>Manage Users</span></a>
                        <a href="a_reports.php?report" class="list-group-item list-group-item-action py-2 ripple"><span>Report</span></a>
                        <div class="btn-group dropend ">
                            <button type="button" class="btn dropdown-toggle text-start bg-danger text-white" data-bs-toggle="dropdown" aria-expanded="false">
                                Audit Trail
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="a_user_logs.php?userlogs">User Logs</a></li>
                                <li><a class="dropdown-item bg-danger text-white" href="a_activity_logs.php?actlogs">Activity Logs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col">
            <div class="container mt-3">
                <h5>Activity Logs</h5>
            </div>
            <div class="bg-white mt-4 py-2 pt-0 pl-0 d-flex rounded overflow-auto" style="height: 700px;">
                <div class="bg-white w-100 rounded" style="position:fixed; z-index:100;">
<!--                     <button class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg>
                        <span>Filter</span>
                    </button> -->
                </div>
                <table class="table table-hover text-center mt-5" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Action</th>
                            <th scope="col">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $item) : ?>
                            <tr style="transform: rotate(0);" class="">
                                <td scope="row"><?php echo $item['aid'] ?></td>
                                <td scope="row"><?php echo $item['name'] ?></td>
                                <th scope="row"><?php echo $item['action'] ?></th>
                                <td scope="row" style="width: 25%"><?php echo $item['timestamp'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</body>

</html>