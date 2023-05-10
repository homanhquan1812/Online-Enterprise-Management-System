<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Ho Manh Quan">
        <meta name="description" content="Department Head Homepage">
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <link rel="stylesheet" href="homepage.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Department Head Homepage</title>
    </head>
    <body>
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap" /></svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 text-white"><i class="fa-solid fa-house-user"> Home</i></a></li>
                        <li style="padding-left: 10px;"><a href="#" class="nav-link px-2 text-white"><i class="fa-solid fa-bars" style="color: #ffffff;"> Product</i></a></li>
                        <li style="padding-left: 10px;"><a href="#" class="nav-link px-2 text-white"><i class="fa-regular fa-calendar" style="color: #ffffff;"> Event</i></a></li>
                        <li style="padding-left: 10px;"><a href="#" class="nav-link px-2 text-white"><i class="fa-solid fa-users"> About Us</i></a></li>
                        <li style="padding-left: 10px;"><a href="#" class="nav-link px-2 text-white"><i class="fa-solid fa-user-doctor" style="color: #ffffff;"> Career</i></a></li>                       
                    </ul>

                    <div class="text-end">
                        <button onclick="document.location='login.php'" type="button" class="btn btn-outline-light me-2"><i class="fa-solid fa-right-to-bracket"> Login</i></button>
                        <button type="button" class="btn btn-warning"><i class="fa-solid fa-memo-circle-info" style="color: #ffffff;"> Register</i></button>
                    </div>
                </div>
            </div>
        </header>

        <div class="information">
            <h1 style="font-size: 60px; font-style: italic; font-weight: bold;">"Committed to Excellence,<br>Dedicated to Your Satisfaction."</h1>
            <h2 style="font-size: 25px;">Our aim is to provide innovative and high-quality products and services that exceed our customers' expectations.</h2>
            <button type="button">Buy our products now</button>
        </div>

        <script src="https://kit.fontawesome.com/fc8a8c5ee5.js" crossorigin="anonymous"></script>
    </body>
</html>