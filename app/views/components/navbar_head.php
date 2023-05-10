<?php
session_start();
?>


<header class="p-3 text-bg-dark">
    <div class="container-nab">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <!-- <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a> -->

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <a href="http://localhost/Assignment/index.php?page=home" class="nav-link px-2 text-white"><i class="bi bi-house"></i> Home</a>
                <!-- <li style="padding-left: 10px;" class="dropdown">
                    <a href="#" class="nav-link px-2 text-white"><i class="fa fa-address-book-o" aria-hidden="true"></i> Members</a>
                    <div class="dropdown-content">
                        <a href="#divOne">List of members from your department</a>
                        <a href="#divOne2">List of all members in the company</a>
                    </div>
                </li> -->
                <li style="padding-left: 10px;" class="dropdown">
                    <a href="#" class="nav-link px-2 text-white"><i class="fa fa-info" aria-hidden="true"></i> Your information</a>
                    <div class="dropdown-content">
                        <a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i> Department:
                            <span style="color: red;">
                                <?php echo $_SESSION['department_name']; ?>
                                <span>
                        </a>
                        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Level: <span id="name" style="color: red;">Department Head<span></a>
                    </div>
                </li>
                <!-- <li style="padding-left: 10px;"><a href="#" class="nav-link px-2 text-white"><i class="fa fa-users" aria-hidden="true"></i> Your level:<span id="name" style="color: yellow;"> Department Head<span></a></li> -->
            </ul>

            <div class="text-end">
                <!-- Information after signing in -->
                <a style="padding-right: 5px;">Welcome back,
                    <span id="name" style="color: yellow;">
                        <?php echo $_SESSION['username']; ?>
                        <span>
                </a>
                <div class="dropdown">
                    <a href="http://localhost/Assignment/index.php?page=Logout">Sign out</a>
                </div>
            </div>
        </div>
    </div>
</header>