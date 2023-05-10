<?php
    include 'dh_db_connection.php';
    include 'task_result.php';
    
    if(!isset($_GET['check']))
    {
        $page = 1;
    }
    else
    {
        $page = $_GET['check'];
    }

    if(!isset($_GET['assign']))
    {
        $page1 = 1;
    }
    else
    {
        $page1 = $_GET['assign'];
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Ho Manh Quan">
        <meta name="description" content="Department Head Homepage">
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <link rel="stylesheet" href="departmentheadUI.css" type="text/css">
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
                        <li class="dropdown">
                            <a href="#" class="nav-link px-2 text-white"><i class="fa-solid fa-list-check" style="color: #ffffff;"> Task List</i></a>
                            <div class="dropdown-content">                        
                                <a href="#divOne3">Tasks Approved</a>
                                <a href="#divOne4">Tasks Pending Approval</a>  
                                <a href="#divOne5">Tasks Rejected</a>
                                <a href="#divOne6">Tasks Not Complete</a>
                            </div>
                        </li>
                        <li style="padding-left: 10px;" class="dropdown">
                            <a href="#" class="nav-link px-2 text-white"><i class="fa-solid fa-users"> Members</i></a>
                            <div class="dropdown-content">
                                <a href="#divOne">List of members from your department</a>
                                <a href="#divOne2">List of all members in the company</a>
                            </div>
                        </li>
                        <li style="padding-left: 10px;" class="dropdown">
                            <a href="#" class="nav-link px-2 text-white"><i class="fa-solid fa-circle-info" style="color: #ffffff;"> Your Info</i></a>
                            <div class="dropdown-content">
                                <?php $row = mysqli_fetch_assoc($result); ?>
                                <a href="#"><i class="fa fa-address-book-o" aria-hidden="true"></i> Department: 
                                    <span style="color: red;">
                                        <?php echo $row['department_name']; ?>
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
                            <?php $row4 = mysqli_fetch_assoc($result4); ?>
                            <span id="name" style="color: yellow;">
                                <?php echo $row4['name']; ?>
                            <span>
                        </a>
                        <div class="dropdown">
                            <img alt="Click here to sign out" src="Avatar.png" role="button" class="dropbtn" width="40px" height="40px">
                            <div class="dropdown-content">
                                <!-- <a href="#">Your level</a> -->
                                <a href="logout.php">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="box">
            <div class="information">
                <h2>Hey, your team members already <br>submitted their work to you.</h2>
                <h2>Let's check them out!</h2>
                <br>
                
                <div class="employee_tasks">
                    <span>
                        <?php $row_tr = mysqli_fetch_assoc($record); ?>
                        <div class="task_number_decoration">TASK 1<hr style="margin-top: 5px;"></div>
                        <div class="task_number_information">From: <span id="name" style="color: red;"> Joe</span></div>
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
                        <button class="button_to_do">Check this task</button>
                    </span>
                </div>
                           
                <!--
                <div class="employee_tasks">
                    <section class="left">
                        <div class="task_number_decoration">TASK 1<hr style="margin-top: 5px;"></div>
                        <div class="task_number_information">From: <span id="name" style="color: red;"> Joe</span></div>
                        <div class="task_number_information">Deadline: </div>
                        <div class="task_number_information">Description: </div>
                        <button class="button_to_do">Check this task</button>
                    </section>
                    <section class="right">
                        <div class="task_number_decoration">TASK 2<hr style="margin-top: 5px;"></div>
                        <div class="task_number_information">From: <span id="name" style="color: red;"> Mama</span></div>
                        <div class="task_number_information">Deadline: </div>
                        <div class="task_number_information">Description: </div>
                        <button class="button_to_do">Check this task</button>
                    </section>
                </div>
                -->
                <br>
                <div class="page-number" style="text-align: center;">
                    <?php 
                        if(!isset($_GET['check'])){
                        ?> <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" class="active" href="departmentheadUI.php?check=1">1</a> <?php
                        $count_from = 2;
                        }else{
                        $count_from = 1;
                        }
                    ?>
                    <?php
                        for($counter = $count_from; $counter <= $page_alt; $counter++)
                        {
                            if($counter == @$_GET['check']) {
                                ?>
                                    <a class="active" style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="departmentheadUI.php?check=<?php echo $counter ?>"><?php echo $counter ?></a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="departmentheadUI.php?check=<?php echo $counter ?>"><?php echo $counter ?></a> <?php
                            }
                        }
                    ?>
                </div>
                <br>
                <h2>You still have to finish all tasks here.<br>Some of which need you to do again:</h2>
                <br>
                <div class="redo_tasks">
                    <?php $row_tr1 = mysqli_fetch_assoc($record1); ?>
                    <span>
                        <div class="task_number_decoration">TASK 1<hr style="margin-top: 5px;"></div>
                        <div class="task_number_information">Task Name: 
                            <span style="color: red;">
                                <?php echo $row_tr1['task_name'] ?>
                            </span>
                        </div>
                        <div class="task_number_information">Description: 
                            <span style="color: red;">
                                <?php echo $row_tr1['task_description'] ?>
                            </span>
                        </div>
                        <div class="task_number_information">Deadline: </div>
                        <div class="task_number_information">Comment from Boss: </div>
                        
                        <form method="POST" action="assign_tasks_to_members.php">
                            <button class="button_to_do">Assign this task to your member</button>
                        </form>
                    </span>
                </div>
                <br>
                <div class="page-number" style="text-align: center;">
                    <?php 
                        if(!isset($_GET['assign'])){
                        ?> <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" class="active" href="departmentheadUI.php?assign=1">1</a> <?php
                        $count_from1 = 2;
                        }else{
                        $count_from1 = 1;
                        }
                    ?>
                    <?php
                        for($counter1 = $count_from1; $counter1 <= $page1_alt; $counter1++)
                        {
                            if($counter1 == @$_GET['assign']) {
                                ?>
                                    <a class="active" style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="departmentheadUI.php?assign=<?php echo $counter1 ?>"><?php echo $counter1 ?></a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a style="background-color: black; display: inline-block; text-decoration: none; color: #006cb3; padding: 10px 20px; border: thin solid #d4d4d4; transition: all 0.3s; font-size: 18px;" href="departmentheadUI.php?assign=<?php echo $counter1 ?>"><?php echo $counter1 ?></a> <?php
                            }
                        }
                    ?>
                </div>
                <br>
            </div>
        </div>
        <!-- List of members from your department -->
        <div class="overlay" id="divOne">
            <div class="wrapper">
                <h2>List of members from your department</h2><a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <br>
                        <table>
                            <tr>
                                <th style="text-align: center;">Team Members</th>
                                <th style="text-align: center;">Level</th>
                                <th style="text-align: center;">Department</th>
                            </tr>
                            <?php while ($row2 = mysqli_fetch_assoc($result2))
                            {
                        ?>
                            <tr>
                                <td><?php echo $row2['name']; ?></td>
                                <td><?php echo $row2['level']; ?></td>
                                <td>
                                    <?php
                                        if ($row2['department_id'] = $department_id)
                                        {
                                            ?>
                                            <?php echo $row2['department_name']; ?>
                                            <?php
                                        }
                                    ?>                                  
                                </td>
                            </tr>   
                        <?php
                            }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- List of all members in the company -->
        <div class="overlay" id="divOne2">
            <div class="wrapper">
                <h2>List of all members in the company</h2><a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <br>
                        <table>
                            <tr>
                                <th style="text-align: center;">Team Members</th>
                                <th style="text-align: center;">Level</th>
                                <th style="text-align: center;">Department</th>
                                <th style="text-align: center;">Available to add to your department</th>
                            </tr>
                        <?php while ($row1 = mysqli_fetch_assoc($result1))
                            {
                        ?>
                            <tr>
                                <td><?php echo $row1['name']; ?></td>
                                <td><?php echo $row1['level']; ?></td>
                                <td><?php echo $row1['department_name']; ?></td>
                                <td>
                                    <?php
                                        if ($row1['department_name'] == null)
                                        {
                                            ?>
                                            <form method="POST" action="dh_db_connection.php">
                                                <input type="hidden" name="department_id" value="<?php echo $row1['department_id']; ?>">
                                                <input type="hidden" name="department_name" value="<?php echo $row1['department_name']; ?>">
                                                <input type="hidden" name="name" value="<?php echo $row1['name']; ?>">
                                                <button type="submit" name="submit" class="btn btn-success">Add this member</button>
                                            </form>
                                            <?php
                                        }
                                        elseif ($row1['department_id'] == $department_id)
                                        {
                                            ?>
                                            <button type="button" class="btn btn-warning">Already in this department</button>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <button type="button" class="btn btn-danger">Not available</button>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>   
                        <?php
                            }
                        ?>
                        
                            <!--
                            <tr>
                                <td>Joe Bro</td>
                                <td>Fresher</td>
                                <td>Sussy Among Us 2</td>
                                <td><button type="button" class="btn btn-danger">Not available</button></td>
                            </tr>
                            <tr>
                                <td>Joe Sis</td>
                                <td>Fresher</td>
                                <td>Sussy Among Us 3</td>
                                <td><button type="button" class="btn btn-danger">Not available</button></td>
                            </tr>
                            <tr>
                                <td>Joe Papa</td>
                                <td>Junior</td>
                                <td>No Team yet</td>
                                <td><button type="button" class="btn btn-success">Add this member</button></td>
                            </tr>
                            <tr>
                                <td>Joe Mama</td>
                                <td>Senior</td>
                                <td>No team yet</td>
                                <td><button type="button" class="btn btn-success">Add this member</button></td>
                            </tr>
                            -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tasks Approved -->
        <div class="overlay" id="divOne3">
            <div class="wrapper">
                <h2>Tasks Approved</h2><a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <br>
                        <table>
                            <tr>
                                <th style="text-align: center;">Team Members</th>
                                <th style="text-align: center;">Level</th>
                                <th style="text-align: center;">Task Name</th>
                                <th style="text-align: center;">Task Description</th>
                                <th style="text-align: center;">Deadline</th>
                                <th style="text-align: center;">Tasks-Submitted Date</th>
                            </tr>
                            <tr>
                                <td>Joe</td>
                                <td>Fresher</td>
                                <td>Sussy Among Us 1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tasks Pending Approval -->
        <div class="overlay" id="divOne4">
            <div class="wrapper">
                <h2>Tasks Pending Approval</h2><a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <br>
                        <table>
                            <tr>
                                <th style="text-align: center;">Team Members</th>
                                <th style="text-align: center;">Level</th>
                                <th style="text-align: center;">Task Name</th>
                                <th style="text-align: center;">Task Description</th>
                                <th style="text-align: center;">Deadline</th>
                                <th style="text-align: center;">Tasks-Submitted Date</th>
                            </tr>
                            <tr>
                                <td>Joe</td>
                                <td>Fresher</td>
                                <td>Sussy Among Us 1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tasks Rejected -->
        <div class="overlay" id="divOne5">
            <div class="wrapper">
                <h2>Tasks Rejected</h2><a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <br>
                        <table>
                            <tr>
                                <th style="text-align: center;">Team Members</th>
                                <th style="text-align: center;">Level</th>
                                <th style="text-align: center;">Task Name</th>
                                <th style="text-align: center;">Task Description</th>
                                <th style="text-align: center;">Deadline</th>
                                <th style="text-align: center;">Tasks-Rejected Date</th>
                            </tr>
                            <tr>
                                <td>Joe</td>
                                <td>Fresher</td>
                                <td>Sussy Among Us 1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tasks Not Complete -->
        <div class="overlay" id="divOne6">
            <div class="wrapper">
                <h2>Tasks Not Complete</h2><a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <br>
                        <table>
                            <tr>
                                <th style="text-align: center;">Team Members</th>
                                <th style="text-align: center;">Level</th>
                                <th style="text-align: center;">Task Name</th>
                                <th style="text-align: center;">Task Description</th>
                                <th style="text-align: center;">Deadline</th>
                            </tr>
                            <tr>
                                <td>Joe</td>
                                <td>Fresher</td>
                                <td>Sussy Among Us 1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/fc8a8c5ee5.js" crossorigin="anonymous"></script>
    </body>
</html>
