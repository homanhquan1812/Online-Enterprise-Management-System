<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Ho Manh Quan">
        <meta name="description" content="Department Head Page">
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Department Head Page</title>
    </head>
    <body>
        <div id="box">
            <div class="information">
            <h1 style="text-align: center; color: yellow;">Task Management</h1>
                <div class="form-container">
                    <h3 id="assigned_employee">Assigned Employee: <span style="font-size: 30px; color: white;">Ho Manh Quan.</span></h3>
                    <h3 id="task_name">Task Name: <span style="font-size: 30px; color: white;">Survey about your Boss.</span></h3>
                    <h3 id="task_description">Task Description: <span style="font-size: 30px; color: white;">Fill in the survey then submit it to the Department Head.</span></h3></h3>
                    <h3 id="deadline">Deadline: <span style="font-size: 30px; color: red;">May 4th 2023.</span></h3>
                </div>
                <br>
                <hr>
                <br>
                <p>You decided to reject this result, please make your next decision:</p>
                <br>
                <form action="" method="POST">
                    <p style="color: yellow">1. Announce this employee to redo the task</p>
                    <p style="color: orange; margin-left: 20px;"><label for="start">New deadline:</label></p>
                    <input type="date" id="new_deadline" name="trip-start" value="2023-04-05">
                    <p style="color: orange; margin-left: 20px;">Comments for this employee:</p>
                    <br>
                    <div>
                        <textarea class="textarea" placeholder="Enter your comments."></textarea>
                    </div>
                    <div class="one-button_reject">
                        <button type="submit" class="submit_button">Send<i style="padding-left: 5px;" class="fa fa-paper-plane"></i></button>
                    </div>
                    <br>
                    <p style="color: yellow;">2. Reject completely this result</p>
                    <p style="color: white; font-weight: 400; margin-left: 20px;">You may find this result unnecessary. Click the below button to reject this result. Employee doing these tasks won't get any notifications from this rejection.</p>
                    <div class="one-button_reject">
                        <button type="submit" class="submit_button">Reject<i style="padding-left: 5px;" class="fa fa-times"></i></button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>