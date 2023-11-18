<!DOCTYPE html>
<html>
    <head>
        <title>About Us</title>
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
                    <a class="nav-link border-bottom border-dark" href="about.php">About Us</a>
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
                  <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                  <li><a class="dropdown-item" href="index.php">Logout</a></li>
                </ul>
              </div>
        </nav>
        
        <!--About-->
        <div class="container mb-5" id="about">
            <div class="justify-content-start">
                <div class="pb-2 pt-2 mb-2 mt-2 border-bottom border-dark">
                    <h3>About Us</h3>
                </div>
                <div class="pb-2 pt-2 mb-2 mt-2 border-bottom border-dark">
                    <h3>Vision</h3>
                    <p>Bulacan State University is a progressive knowledge-generating institution globally 
                            recognized for excellent instruction, pioneering research, and responsive community engagements</p>
                </div>

                <div class="pb-2 pt-2 mb-2 mt-2 border-bottom border-dark">
                    <h3>Mission</h3>
                    <p>Bulacan State University exists to produce highly competent, ethical and 
                        service-oriented professionals that contribute to the sustainable socio-economic growth and development of the nation</p> 
                </div>
            </div>
        </div>

        <!--Team-->
        <div class="container mb-5 mt-5">
            <div class="row mt-4">
                <div class="col text-center">
                    <h3>Meet The Team</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 text-center">
                    <i class="bi bi-person-circle" id="profile"></i>
                    <h6>Jastine Zaplan</h6>
                    <p>•Team Leader<br>•System Analyst</p>
                </div>

                <div class="col-md-4 text-center">
                    <i class="bi bi-person-circle" id="profile"></i>
                    <h6>John Barleta</h6>
                    <p>•UI/UX Designer</p>
                </div>

                <div class="col-md-4 text-center">
                    <i class="bi bi-person-circle" id="profile"></i>
                    <h6>Christian Castro</h6>
                    <p>•Data Analyst</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-6 text-center" id="pers">
                    <i class="bi bi-person-circle" id="profile"></i>
                    <h6>Marcus Sanchez</h6>
                    <p>•Programmer<br>•Database Analyst</p>
                </div>

                <div class="col-6 text-center" id="pers">
                    <i class="bi bi-person-circle" id="profile"></i>
                    <h6>Jomar Navarro</h6>
                    <p>•Data Analyst</p>
                </div>
                </div>
            </div>
        </div>

        <!--footer-->
        <div class="footer bg-white pt-4 pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <h5>Contact Us</h5>
                            <i class="bi bi-geo-alt-fill"></i>Address<br>
                            <i class="bi bi-telephone-fill"></i>(123)456 789<br>
                            <i class="bi bi-envelope"></i>Email<br>
                            <i class="bi bi-facebook"></i></i>Facebook<br>
                    </div>

                    <div class="col-2">
                            <i>Home<br></i>
                            <i>Profile<br></i>
                            <i>Settings</span></i>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>