<?php
include 'config/database.php';
session_start();

$sql = 'SELECT * FROM post_form WHERE verify = 1 ORDER BY date DESC';
$result = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);


function timeAgo($time_ago)
{
    $time_ago =  strtotime($time_ago) ? strtotime($time_ago) : $time_ago;
    $time  = time() - $time_ago;

    switch (true):
            // seconds
        case $time <= 60;
            return 'less than a minute ago';
            // minutes
        case $time >= 60 && $time < 3600;
            return (round($time / 60) == 1) ? 'a minute' : round($time / 60) . ' minutes ago';
            // hours
        case $time >= 3600 && $time < 86400;
            return (round($time / 3600) == 1) ? 'a hour ago' : round($time / 3600) . ' hours ago';
            // days
        case $time >= 86400 && $time < 604800;
            return (round($time / 86400) == 1) ? 'a day ago' : round($time / 86400) . ' days ago';
            // weeks
        case $time >= 604800 && $time < 2600640;
            return (round($time / 604800) == 1) ? 'a week ago' : round($time / 604800) . ' weeks ago';
            // months
        case $time >= 2600640 && $time < 31207680;
            return (round($time / 2600640) == 1) ? 'a month ago' : round($time / 2600640) . ' months ago';
            // years
        case $time >= 31207680;
            return (round($time / 31207680) == 1) ? 'a year ago' : round($time / 31207680) . ' years ago';

    endswitch;
}

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$role = $_SESSION['user_type'];

if (isset($_GET['home'])) {
    $log = "Go to Home";
    $ulog = "INSERT INTO `user_logs`(`fname`, `lname`, `role`, `action`) VALUES ('$fname','$lname','$role','$log')";
    mysqli_query($conn, $ulog);
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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
                    <a class="nav-link border-bottom border-dark" href="a_home.php?home">Home <span class="sr-only">(current)</span></a>
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
                <li><a class="dropdown-item" href="a_dashboard.php?dashboard">Dashboard</a></li>
                <li><a class="dropdown-item" href="logout.php?logout">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!--Body-->
    <div class=" pt-4">
        <div class="container mb-5">
            <div class="row">

                <!--Left-->
                <div class="col-2">
                </div>

                <!--Center-->
                <div class="col-7">
                    <div class="bg-white border-gray py-2" id="center_body">
                        <div class="row">
                            <div class="col">
                                <i class="bi bi-person-circle" id="person"></i>
                                <a class="w-75 border border-gray text-gray-dark rounded-pill bg-white ps-2 text-start link-dark text-decoration-none" type="button" href="create_post.php">Create Post...</a>
                                <a href="#" class="link-dark"><i class="bi bi-card-image" id="person"></i></a>
                                <a href="#" class="link-dark"><i class="bi bi-link-45deg" id="person"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white border-gray py-1 px-3 mt-3">
                        <div class="row">
                        </div>
                        <div class="row d-flex">
                            <div class="col-10">
                                <button class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                                        <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                                    </svg> Hot</button>
                                <button class="btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
                                    </svg> New</button>
                            </div>
                            <div class="col-2">
                                <div class="dropdown text-end">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu" id="profile_drop">
                                        <li><a class="dropdown-item" href="#">Card</a></li>
                                        <li><a class="dropdown-item" href="#">Compact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Posts-->
                    <?php foreach ($posts as $item) : ?>

                        <div class="bg-white border-gray mt-4">

                            <!--post header-->
                            <div class="d-flex pt-2" id="post">
                                <div class="col d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle mx-2" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold fs-6">
                                            <?php echo $item['auth_fname'] ?> <?php echo $item['auth_lname'] ?>
                                        </span>
                                        <span class="text-grau-darker" id="auth_name"><?php echo $item['auth_role'] ?> •
                                            <?php
                                            $getTimestamp = $item['date'];
                                            $timestamp = strtotime($getTimestamp);
                                            echo timeAgo($timestamp);
                                            ?></span>
                                    </div>
                                </div>
                                <div class="p-2 text-gray-darker">
                                    <button class="btn rounded-circle hover-dark p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!--post tite+body-->
                            <div class="post-body pt-2 ps-" id="post">
                                <div class="post-title fw-bold">
                                    <a class="text-decoration-none text-black" href="a_post.php">
                                        <?php echo $item['title'] ?>
                                    </a>
                                </div>
                                <div class="post-text pt-2">
                                    <a class="text-decoration-none text-black" href="a_post.php">
                                        <?php echo $item['body'] ?>
                                    </a>
                                </div>
                            </div>

                            <!--post image-->
                            <div class="post-image pt-2">
                                <?php
                                $hasImage = 0;
                                $dirname = $item['location'];
                                $path = 'post/' . $dirname . 'images/';

                                $checkimg = glob($path . "*.{jpg,jpeg,png}");

                                ?>
                            </div>

                            <!--post footer-->
                            <div class="post-footer p-2" id="post">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn left-button post-button bg-white border-0 text-black" data-bs-toggle="button" autocomplete="off">
                                        <i class="bi bi-arrow-up-short fa-lg ms-2"></i>
                                        <?php
                                        $pid = $item['form_id'];

                                        echo $item['upvote'] ?>
                                    </button>
                                    <button type="button" class="left-button post-button bg-white border-0 text-black" data-bs-toggle="button">
                                        <i class="bi bi-arrow-down-short fa-lg"></i>
                                        <?php echo $item['downvote'] ?>
                                    </button>
                                    <button type="button" id="foot_btnc" class="left-button post-button bg-white border-0 text-black">
                                        <i class="bi bi-chat-square fa-lg ms-5"></i>
                                        <a class="text-decoration-none text-black" href="a_post.php">Comment</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>

                <!--Right-->
                <div class="col">
                    <ul class="list-group" id="popular">
                        <div class="fw-bold">Recommended Posts</div>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="">
                                <img src="image/logo.png" width="20" height="20" class="rounded">
                            </div>
                            <div class="ps-2 lh-1">
                                <div class="fw-bold">Title</div>
                                <div class="text-secondary fw-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="">
                                <img src="image/logo.png" width="20" height="20" class="rounded">
                            </div>
                            <div class="ps-2 lh-1">
                                <div class="fw-bold">Title</div>
                                <div class="text-secondary fw-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="">
                                <img src="image/logo.png" width="20" height="20" class="rounded">
                            </div>
                            <div class="ps-2 lh-1">
                                <div class="fw-bold">Title</div>
                                <div class="text-secondary fw-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <div class="d-flex justify-content-center m-3">
        <div class="spinner-grow text-danger" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45b063e61e.js" crossorigin="anonymous"></script>
</body>

</html>