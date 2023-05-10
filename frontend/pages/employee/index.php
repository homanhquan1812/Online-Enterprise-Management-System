<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Ho Manh Quan">
        <meta name="description" content="Employee Tasks">
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Employee Page</title>
    </head>
    <body>
        <div id="box">
            <div class="information">
                <h1 style="text-align: center; color: yellow;">Employee Tasks</h1>
                <div class="form-container">
                    <!--
                    <form action="upload.php" enctype="multipart/form-data" method="POST">                  
                        <div class="left_description">
                            <h3 id="assigned_employee">Assigned Employee:</h3>
                            <h3 id="task_name">Task Name:</h3>
                            <h3 id="task_description">Task Description:</h3>
                            <h3 id="deadline">Deadline:</h3>
                        </div>
                        <div class="right_description">
                            <div class="center">
                            <button type="submit" class="submit_button">Send<i style="padding-left: 5px;" class="fa fa-send-o"></i></button>
                            </div>
                            <div class="center">
                                <label for="fileToUpload" class="custom-file-upload">Upload files<i style="padding-left: 5px;" class="fa fa-cloud-upload"></i></label>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        </div>
                        -->
                        <h3 id="assigned_employee">Assigned Employee: <span style="font-size: 30px; color: white;">Ho Manh Quan.</span></h3>
                        <h3 id="task_name">Task Name: <span style="font-size: 30px; color: white;">Survey about your Boss.</span></h3>
                        <h3 id="task_description">Task Description: <span style="font-size: 30px; color: white;">Fill in the survey then submit it to the Department Head.</span></h3></h3>
                        <h3 id="deadline">Deadline: <span style="font-size: 30px; color: red;">May 4th 2023.</span></h3>
                    <!-- </form> -->
                </div>
                <br>
                <hr>
                <br>
                <h1 style="text-align: center; color: yellow;">Tasks</h1>
                <p style="font-weight: bold;">1. How handsome is our Boss?</p>
                <ul class="choices">
                    <li>
                        <label><input type="radio" name="question0" value="A"  /><span> Ugly af.</span></label>
                    </li>
                    <li>
                        <label><input type="radio" name="question0" value="B"  /><span> Normal.</span></label>
                    </li>
                    <li>
                        <label><input type="radio" name="question0" value="C"  /><span> Handsome.</span></label>
                    </li>
                    <li>
                        <label><input type="radio" name="question0" value="D"  /><span> I want his baby now.</span></label>
                    </li>
                </ul>
                <p style="font-weight: bold;">2. Do you want to quit this company (We want an honest answer)?</p>
                <ul class="choices">
                    <li>
                        <label><input type="radio" name="question0" value="A"  /><span> No.</span></label>
                    </li>
                    <li>
                        <label><input type="radio" name="question0" value="B"  /><span> Yesn't.</span></label>
                    </li>
                    <li>
                        <label><input type="radio" name="question0" value="C"  /><span> Yes.</span></label>
                    </li>
                    <li>
                        <label><input type="radio" name="question0" value="D"  /><span> Just fire me already, god damn it.</span></label>
                    </li>
                </ul>
                <p style="font-weight: bold;">3. Got any opinions to share with us?</p>
                <br>
                <textarea class="textarea" placeholder="Enter your opinions."></textarea>
                <br>
                <form action="upload.php" enctype="multipart/form-data" method="POST">
                    <div class="two-buttons">
                        <button type="submit" class="submit_button">Send<i style="padding-left: 5px;" class="fa fa-send-o"></i></button>
                        <label for="fileToUpload" class="custom-file-upload">Upload files<i style="padding-left: 5px;" class="fa fa-cloud-upload"></i></label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                </form>
                <br>
            </div>
        </div>
    </body>
</html>