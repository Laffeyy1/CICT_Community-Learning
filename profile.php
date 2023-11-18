<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
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
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                  </li>
                </ul>
                <!--Search-->
                <form class="d-flex w-50" id="sech">
                    <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
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
                  <li><a class="dropdown-item" href="logout.php?logout">Logout</a></li>
                </ul>
              </div>
        </nav>
        
        <div class="row" id="about">
            <div class="col-sm-3">

            </div>

            <div class="col-sm-6">
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-3 text-center">
                                <i class="bi bi-person-circle" id="profile"></i>
                            </div>
                            <div class="col mt-5">
                                <h3>Username</h3>
                                <p><i>43 followers</i></p>
                                <p>(Bio) Welcome to my profile!</p>
                            </div>
                            <div class="col-2 mt-5">
                                <input type="button" class="btn btn-dark" value="Follow">
                            </div>
                            <div class="px-4" id="border">
                                <div class="border-bottom border-dark"></div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col">
                                <nav class="list-group px-3">
                                    <ul class="list-inline border-bottom border-dark">
                                        <li class="list-inline-item border-bottom border-2 border-danger">
                                            <a class="nav-link" href="#">Profile</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="nav-link" href="#">Posts</a>
                                        </li>
                                            <li class="list-inline-item">
                                            <a class="nav-link" href="#">Answers</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="nav-link" href="#">Questions</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="px-2">
                            <h5>Timeline</h5>

                            <!--post-->
                            <div class="bg-white border border-gray mt-4">

                                <!--post header-->
                                <div class="d-flex pt-2" id="post">
                                    <div class="col d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                          </svg>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold fs-6">Author name</span>
                                            <span class="text-grau-darker" id="auth_name">Author Role • 4 hours ago</span>
                                        </div>
                                    </div>
                                    <div class="p-2 text-gray-darker" >
                                        <button class="btn rounded-circle hover-dark p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                              </svg>
                                        </button>
                                    </div>
                                </div>
    
                                <!--post tite+body-->
                                <div class="post-body pt-2 ps-" id="post">
                                    <div class="post-title fw-bold">
                                        <a class="text-decoration-none text-black" href="#">
                                            Title
                                        </a>
                                    </div>
                                    <div class="post-text pt-2">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
    
                                <!--post image-->
                                <div class="post-image pt-2">
                                    <img class="img-fluid" src="image/bg.jpg">
                                </div>
    
                                <!--post footer-->
                                <div class="post-footer p-2" id="post">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="foot_btn"class="left-button post-button bg-white border-0 text-black p-1">
                                              <i class="bi bi-arrow-up-short fa-lg ms-2"></i>
                                              15
                                        </button>
                                        <button type="button" id="foot_btn"class="left-button post-button bg-white border-0 text-black p-1">
                                            <i class="bi bi-arrow-down-short fa-lg"></i>
                                              1
                                         </button>
                                         <button type="button" id="foot_btnc"class="left-button post-button bg-white border-0 text-black p-1">
                                        <i class="bi bi-chat-square fa-lg ms-5"></i>
                                        Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
            </div>

            <div class="col-sm-3">
                <div class="bg-white pt-4 px-2">
                    <h6>Information:</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: Fname, Lname</li>
                        <li class="list-group-item">Role: Student</li>
                        <li class="list-group-item">Course: BSIT</li>
                        <li class="list-group-item">Section: 3J-G1</li>
                      </ul>

                </div>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>