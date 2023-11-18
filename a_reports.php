<?php
session_start();
include 'config/database.php';
$sql = 'SELECT * FROM user_form WHERE user_type in ("student" ,"professor") AND verify = "1"';
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

$dusers = "SELECT COUNT(`date`) As 'Daily' FROM reports WHERE DATE(date) = CURRENT_DATE() AND activity = 'Login'";
$d = mysqli_query($conn, $dusers);
$dres=mysqli_fetch_all($d,MYSQLI_ASSOC);

$susers = "SELECT COUNT(`date`) As 'Daily' FROM reports WHERE DATE(date) = CURRENT_DATE() AND activity = 'Login' AND `user_type` = 'student'";
$s = mysqli_query($conn, $dusers);
$sres = mysqli_fetch_all($s,MYSQLI_ASSOC);

$pusers = "SELECT COUNT(`date`) As 'Daily' FROM reports WHERE DATE(date) = CURRENT_DATE() AND activity = 'Login' AND `user_type` = 'professor'";
$p = mysqli_query($conn, $pusers);
$pres = mysqli_fetch_all($p,MYSQLI_ASSOC);

$dpost = "SELECT COUNT(`date`) As 'Daily' FROM reports WHERE DATE(date) = CURRENT_DATE() AND activity = 'Post'";
$dp = mysqli_query($conn, $dpost);
$dpres = mysqli_fetch_all($dp,MYSQLI_ASSOC);

$inter = "SELECT COUNT(`date`) As 'Daily' FROM reports WHERE DATE(date) = CURRENT_DATE() AND activity = 'Post'";
$i = mysqli_query($conn, $inter);
$int = mysqli_fetch_all($i,MYSQLI_ASSOC);

$query = "SELECT SUM(activity = 'Login')AS users, DATE(date) AS daily FROM reports GROUP BY DATE(reports.date)";
$a = mysqli_query($conn, $query);
$daily = mysqli_fetch_all($a,MYSQLI_ASSOC);

$wquer = "SELECT SUM(activity = 'Login')AS users, WEEK(date) AS weekly FROM reports GROUP BY WEEK(reports.date)";
$qw = mysqli_query($conn, $wquer);
$weekly = mysqli_fetch_all($qw,MYSQLI_ASSOC);

$mquer = "SELECT SUM(activity = 'Login')AS users, MONTH(date) AS monthly FROM reports GROUP BY MONTH(reports.date)";
$qm = mysqli_query($conn, $mquer);
$monthly = mysqli_fetch_all($qm,MYSQLI_ASSOC);

$yquer = "SELECT SUM(activity = 'Login')AS users, YEAR(date) AS yearly FROM reports GROUP BY YEAR(reports.date)";
$qy = mysqli_query($conn, $yquer);
$yearly = mysqli_fetch_all($qy,MYSQLI_ASSOC);


if(isset($_POST['day'])){
    foreach($daily as $data){
        $daily_users[] = $data['users'];
        $date[] = $data['daily'];
    }
}
elseif(isset($_POST['week'])){
    foreach($weekly as $data){
        $daily_users[] = $data['users'];
        $date[] = $data['weekly'];
    }
}
elseif(isset($_POST['month'])){
    foreach($monthly as $data){
        $daily_users[] = $data['users'];
        $date[] = $data['monthly'];
    }
}
elseif(isset($_POST['year'])){
    foreach($yearly as $data){
        $daily_users[] = $data['users'];
        $date[] = $data['yearly'];
    }
}
else{
    foreach($daily as $data){
        $daily_users[] = $data['users'];
        $date[] = $data['daily'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Reports</title>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <a href="a_reports.php?report" class="list-group-item list-group-item-action py-2 ripple bg-danger text-white"><span>Report</span></a>
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
                <h5>Reports</h5>
            </div>
            <div class="container bg-white mt-4 py-3 rounded">
                <div class="row mb-5">
                    <div class="col-2"></div>
                    <div class="col-6">
                        <div class="row mb-4">
                            <p class="h5">Daily Users</p>
                            <p class="h6 text-danger"><?php foreach($dres as $item) : echo $item['Daily']?><?php endforeach?></p><br>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <p class="h5">Student</p>
                                <p class="h6 text-danger"><?php foreach($sres as $item): echo $item['Daily']?><?php endforeach?></p><br>
                            </div>
                            <div class="col-1">
                                <p class="h5">•</p>
                                <p class="h6"></p>
                            </div>
                            <div class="col-2">
                                <p class="h5">Professor</p>
                                <p class="h6 text-danger"><?php foreach($pres as $item): echo $item['Daily']?><?php endforeach?></p><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row mb-4">
                            <p class="h5">Daily Thread Posted</p>
                            <p class="h6 text-danger"><?php foreach($dpres as $item): echo $item['Daily']?><?php endforeach?></p><br>
                        </div>
                        <div class="row">
                            <p class="h5">Daily User Interaction</p>
                            <p class="h6 text-danger"><?php foreach($int as $item): echo $item['Daily']?><?php endforeach?></p>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-3 p5">
                    </div>
                    <div class="col p5">
                        <div class="text-end">
                            <div class="btn-group dropdown">
                                <button type="button" class="btn dropdown-toggle text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by:
                                </button>
                                <form method="post">
                                <ul class="dropdown-menu">
                                    <li><button type="submit" class="dropdown-item" href="#" value="day" name="day">Daily</button></li>
                                    <li><button type="submit" class="dropdown-item" href="#" value="week" name="week">Weekly</button></li>
                                    <li><button type="submit" class="dropdown-item" href="#" value="month" name="month">Monthly</button></li>
                                    <li><button type="submit" class="dropdown-item" href="#" value="year" name="year">Yearly</button></li>
                                </ul>
                                </form>
                            </div>
                        </div>
                        <canvas id="myChart" width="400" ></canvas>
                    </div>
                    <div class="col-3 p5">
                    </div>
                </div>
            </div>
            <script>
                const labels = <?php echo json_encode($date)?>;
                const datas = new Array;

                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# of Users',
                            data: <?php echo json_encode($daily_users)?>,
                            borderWidth: 1,
                            borderColor: '#dc3545',
                            backgroundColor: '#dc3545',
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                
                function timeFrame(period){
                    if(period.value == 'day'){
                        
                    }
                    

                }
            </script>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</body>

</html>