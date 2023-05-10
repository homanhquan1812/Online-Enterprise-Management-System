<?php
    include 'em_db_connection.php';
    include 'task_result.php';
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Ho Manh Quan">
        <meta name="description" content="Employee Homepage">
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <link rel="stylesheet" href="employeeUI.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Employee Homepage</title>
    </head>
    <body>
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap" /></svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li class="dropdown">
                            <a href="#" class="nav-link px-2 text-white"><i class="fa fa-list" aria-hidden="true"></i> Task List</a>
                            <div class="dropdown-content">
                                <a href="#divOne">Tasks Complete</a>
                                <a href="#divOne2">Tasks Not Complete</a>
                            </div>
                        </li>
                        <li style="padding-left: 10px;" class="dropdown">
                            <a href="#" class="nav-link px-2 text-white"><i class="fa fa-info" aria-hidden="true"></i> Your information</a>
                            <div class="dropdown-content">
                                <?php $row = mysqli_fetch_assoc($result); ?>
                                <a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i> Department: 
                                    <span style="color: red;">
                                        <?php echo $row['department_name']; ?>
                                    <span>
                                </a>
                                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Level: 
                                    <span id="name" style="color: red;">Employee - 
                                        <?php echo $row['level']; ?>
                                    <span>
                                </a>
                            </div>
                        </li>
                        <!-- <li style="padding-left: 10px;"><a href="#" class="nav-link px-2 text-white"><i class="fa fa-users" aria-hidden="true"></i> Your level:<span id="name" style="color: yellow;"> Employee<span></a></li> -->
                    </ul>

                    <div class="text-end">
                        <a style="padding-right: 5px;">Welcome back, 
                            <span id="name" style="color: yellow;">
                                <?php echo $row['name']; ?>
                            <span>
                        </a>
                        <div class="dropdown">
                            <img alt="Click here to sign out" src="Avatar.png" role="button" class="dropbtn" width="40px" height="40px">
                            <div class="dropdown-content">
                                <!-- <a href="#">Your level</a> -->
                                <a href="#">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="box">
            <div class="information">
                <h2>Hey, you still have some tasks not complete.</h2>
                <h2>Shall we finish them now?</h2>
                <br>
                <div class="redo_tasks">
                    <!--
                    <span class="left">
                        <div class="task_number_decoration">TASK 1<hr style="margin-top: 5px;"></div>
                        <div class="task_number_information">Deadline: </div>
                        <div class="task_number_information">Description: </div>
                        <button class="button_to_do">Do this task now</button>
                    </span>
                    <span class="right">
                        <div class="task_number_decoration">TASK 2<hr style="margin-top: 5px;"></div>
                        <div class="task_number_information">Deadline: </div>
                        <div class="task_number_information">Description: </div>
                        <button class="button_to_do">Do this task now</button>
                    </span>
                    -->
                    <span>
                        <?php $row_tr = mysqli_fetch_assoc($result_tr); ?>
                        <div class="task_number_decoration">TASK 1<hr style="margin-top: 5px;"></div>
                        <div class="task_number_information">Task Name: 
                            <span style="color: red;">
                                <?php echo $row_tr['task_name'] ?>
                            </span>
                        </div>
                        <div class="task_number_information">Description: 
                            <span style="color: red;">
                                <?php echo $row_tr['task_description'] ?>
                            </span>
                        </div>
                        <div class="task_number_information">Deadline: </div>
                        <button class="button_to_do">Do this task now</button>
                    </span>
                </div>
                <br>
                <div class="page-number" style="text-align: center;">
                    <?php 
                        if(!isset($_GET['pagination'])){
                        ?> <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" class="active" href="index.php?page=faqs&pagination=1">1</a> <?php
                        $count_from = 2;
                        }else{
                        $count_from = 1;
                        }
                    ?>
                    <?php
                        for($counter = $count_from; $counter <= 10; $counter++)
                        {
                            if($counter == @$_GET['pagination']) {
                                ?>
                                    <a class="active" style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="index.php?page=faqs&pagination=<?php echo $counter ?>"><?php echo $counter ?></a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="index.php?page=faqs&pagination=<?php echo $counter ?>"><?php echo $counter ?></a> <?php
                            }
                        }
                    ?>
                </div>
                <br>
                <h2>You still have to finish all tasks here.<br>Some of which need you to do again:</h2>
                <br>
                <div class="redo_tasks">
                    <span>
                        <?php $row_tr1 = mysqli_fetch_assoc($result_tr1); ?>
                        <div class="task_number_decoration">TASK 1<hr style="margin-top: 5px;"></div>
                        <div class="task_number_information">Task Name: 
                            <span style="color: red;">
                                <?php echo $row_tr['task_name'] ?>
                            </span>
                        </div>
                        <div class="task_number_information">Description: 
                            <span style="color: red;">
                                <?php echo $row_tr['task_description'] ?>
                            </span>
                        </div>
                        <div class="task_number_information">Deadline: </div>
                        <div class="task_number_information">Comment from Department Head: </div>
                        <button class="button_to_do">Do this task now</button>
                    </span>
                </div>
                <br>
                <div class="page-number" style="text-align: center;">
                    <?php 
                        if(!isset($_GET['pagination'])){
                        ?> <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" class="active" href="index.php?page=faqs&pagination=1">1</a> <?php
                        $count_from = 2;
                        }else{
                        $count_from = 1;
                        }
                    ?>
                    <?php
                        for($counter = $count_from; $counter <= 10; $counter++)
                        {
                            if($counter == @$_GET['pagination']) {
                                ?>
                                    <a class="active" style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="index.php?page=faqs&pagination=<?php echo $counter ?>"><?php echo $counter ?></a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="index.php?page=faqs&pagination=<?php echo $counter ?>"><?php echo $counter ?></a> <?php
                            }
                        }
                    ?>
                </div>
                <br>
            </div>
        </div>
        <!-- Tasks Complete -->
        <div class="overlay" id="divOne">
            <div class="wrapper">
                <h2>Tasks Complete</h2><a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <br>
                        <table>
                            <tr>
                                <th style="text-align: center;">Task Name</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Deadline</th>
                            </tr>
                            <tr>
                                <td>Joe</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                            </tr>
                            <tr>
                                <td>Joe Bro</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                            </tr>
                            <tr>
                                <td>Joe Sis</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                            </tr>
                            <tr>
                                <td>Joe Papa</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                            </tr>
                            <tr>
                                <td>Joe Mama</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tasks Not Complete -->
        <div class="overlay" id="divOne2">
            <div class="wrapper">
                <h2>Tasks Not Complete</h2><a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <br>
                        <table>
                            <tr>
                                <th style="text-align: center;">Task Name</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Deadline</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>Joe</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                                <td><button type="button" class="btn btn-dark">Do this task now</button></td>
                            </tr>
                            <tr>
                                <td>Joe Bro</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                                <td><button type="button" class="btn btn-dark">Do this task now</button></td>
                            </tr>
                            <tr>
                                <td>Joe Sis</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                                <td><button type="button" class="btn btn-dark">Do this task now</button></td>
                            </tr>
                            <tr>
                                <td>Joe Papa</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                                <td><button type="button" class="btn btn-dark">Do this task now</button></td>
                            </tr>
                            <tr>
                                <td>Joe Mama</td>
                                <td>You have to describe the sussy impostor who killed your best crewmate, so that we can eliminate him.</td>
                                <td>06/09/2420</td>
                                <td><button type="button" class="btn btn-dark">Do this task now</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
