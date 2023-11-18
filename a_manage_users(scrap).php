<?php
session_start();
include 'config/database.php';
$sql = 'SELECT * FROM user_form WHERE user_type = "student" or user_type = "professor"';
$result = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['user_id'])) {
    $disp = "nice";
} else {
    $disp = '<button type="button" class="btn border" data-bs-dismiss="modal">Cancel</button>';
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
                    <a class="nav-link" href="a_home.php">Home <span class="sr-only">(current)</span></a>
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
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="index.php">Logout</a></li>
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
                        <a href="a_dashboard.php" class="list-group-item list-group-item-action py-2 ripple"><span>Verify Post</span></a>
                        <a href="a_validate_users.php" class="list-group-item list-group-item-action py-2 ripple"><span>Validate Students/Professor</span></a>
                        <a href="a_manage_users.php" class="list-group-item list-group-item-action py-2 ripple bg-danger text-white"><span>Manage Users</span></a>
                        <a href="Users.php" class="list-group-item list-group-item-action py-2 ripple"><span>Reports</span></a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col">
            <div class="container mt-3">
                <h5>Manage Users</h5>
            </div>
            <div class="container bg-white mt-4 py-2 rounded ">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <?php foreach ($posts as $item) : ?>
                        <tbody>
                            <tr style="transform: rotate(0);" data-uid="<?php echo $item['id'] ?>">
                                <th scope="row"><?php echo $item['id'] ?></th>
                                <td><?php echo $item['Fname'] ?></td>
                                <td><?php echo $item['Lname'] ?></td>
                                <td><?php echo $item['user_type'] ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach ?>
                </table>
                <div class="row text-start">
                    <div class="col-9">
                        <form method="get">
                            <label>Selected Row Id:</label>
                            <input type="text" class="border rounded px-2" name="user_id" id="uid">
                        </form>
                        <?php

                        ?>
                    </div>
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create">
                            Create
                        </button>
                        <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#update">
                            Update
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
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
                                    <form>
                                        <div class="modal-body text-center">
                                            <div class="row my-2">
                                                <div class="form-group d-flex flex-column w-50">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control border" id="fname" placeholder="Name">
                                                        <label for="fname">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex flex-column w-50">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control border" id="lname" placeholder="Name">
                                                        <label for="lname">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="form-group d-flex flex-column w-100">
                                                    <div class="form-floating">
                                                        <input type="email" class="form-control border" id="email" placeholder="Email">
                                                        <label for="email">Email address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center my-2">
                                                <div class="form-group d-flex flex-column w-50">
                                                    <div class="form-floating">
                                                        <input type="password" class="form-control" id="pass" placeholder="Password">
                                                        <label for="pass">Password</label>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex flex-column w-50">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                            <option disabled selected>--Select Role--</option>
                                                            <option value="student">Student</option>
                                                            <option value="professor">Professor</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Role</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn border" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-success">Create</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- update modal -->
                        <div class="modal fade bd-example-modal-lg" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Create</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form>
                                        <div class="modal-body text-center">
                                            <div class="row my-2">
                                                <div class="form-group d-flex flex-column w-50">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control border" id="fname" placeholder="Name">
                                                        <label for="fname">First Name</label>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex flex-column w-50">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control border" id="lname" placeholder="Name">
                                                        <label for="lname">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="form-group d-flex flex-column w-100">
                                                    <div class="form-floating">
                                                        <input type="email" class="form-control border" id="email" placeholder="Email">
                                                        <label for="email">Email address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center my-2">
                                                <div class="form-group d-flex flex-column w-50">
                                                    <div class="form-floating">
                                                        <input type="password" class="form-control" id="pass" placeholder="Password">
                                                        <label for="pass">Password</label>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex flex-column w-50">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                            <option disabled selected>--Select Role--</option>
                                                            <option value="student">Student</option>
                                                            <option value="professor">Professor</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Role</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn border" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-success">Create</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- delete modal -->
                        <div class="modal fade bd-example-modal-lg" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form>
                                        <div class="modal-body text-center">
                                            <div class="row my-3">
                                                <div class="form-group d-flex flex-column">
                                                    <div class="form-floating">
                                                        <form method="post">
                                                            Are you sure you want to delete row <?php echo $disp; ?>
                                                            <button type="button" class="btn border" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script>
                $("form").on('submit', function() {
                    $('.modal').show();
                })
            </script>
            <script>
                (function(document, window, $) {
                    $('.table tbody tr').on('click', function() {
                        var uid = $(this).data('uid');

                        if ($('input[name=user_id').length > 0) {
                            $('input[name=user_id]').val(uid).submit();
                        }
                    });
                })(document, window, jQuery);
            </script>

</body>

</html>