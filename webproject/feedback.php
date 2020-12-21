<?php 
include 'dbconnection.php';
if(isset($_POST['submit']))
{

    $Email = $_POST['email'];
    $Name = $_POST['username'];
    $Rate = $_POST['us'];
    $Comment = $_POST['usr'];
    

    $sql = "INSERT INTO feedback(mail_id,Name,Ratings,Comments) VALUES(?,?,?,?)";

    //preparing the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis",$Email,$Name,$Rate,$Comment);
    $result = $stmt->execute();

    if($result)
    {
     header("location:Home-page.html");
    }
?>
    <script>alert("Thank You for your valuable Feedback");</script>
    <?php
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    <header>
    <ul> 
            		 <li ><a href="Home-page.html">Home</a></li>
            		 <li><a href="aboutus.html">About us</a></li>
            		 <li><a href="contactus.html">Contact us</a></li>
            		 <li><a href="photospage.html">Photos</a></li>
                     <li><a href="Login.php">Login</a></li>
                     <li><a href="rev.html">Reviews</a></li>
                     <li class="active"><a href="#">Feedback</a></li>
                                          
                </ul>
    <div class="container">
        <form method="post" action="feedback.php">
            <div class="form">
                <h2>Send Feedback</h2>
                <div class="user">
                    <input type="email" placeholder="Enter your Email" name="email" autocomplete="off"> 
                </div>
                <div class="username">
                    <input type="text" placeholder="Enter your Name" name="username" autocomplete="off">
                </div>
                <div class="us">
                    <input type="text" placeholder="Rate out of 5" name="us" autocomplete="off">
                </div>
                <div class="usr">
                    <input type="text" placeholder="Comment Here" name="usr" autocomplete="off">
                </div>
                <div class="button" >
                  <button type="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </header>
</body>
</html>