<?php 
include 'dbconnection.php';
if(isset($_POST['submit']))
{

    $Name = $_POST['name'];
    $Contact = $_POST['cnumber'];
    $Email = $_POST['email'];
    $Password = $_POST['pass'];
    $Confirm = $_POST['cpass'];
    $pass = password_hash($Password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO customer(mail_id,Name,Contact_Number,password) VALUES(?,?,?,?)";

    //preparing the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis",$Email,$Name,$Contact,$pass);
    $result = $stmt->execute();

    if($result)
    {
       header("location:Post-Registration.html");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Life Time Memories-Register</title>
  <link rel = "stylesheet" type="text/css" href="Stylerf.css">
</head>
<body>
<header>
		 <ul> 
			 <li><a href="Home-page.html">Home</a></li>
			 <li ><a href="aboutus.html">About us</a></li>
			 <li><a href="contactus.html">Contact us</a></li>
			 <li><a href="photospage.html">Photos</a></li>
			 <li class="active"><a href="#">Login</a></li>
       <li><a href="rev.html">Reviews</a></li>
       <li><a href="feedback.php">Feedback</a></li>
									
		  </ul>
		</header>
<div class="container">
	<form method="post" action="Register-Here.php" >
		<h1>Register Here</h1> <br><br>
		<label>Name &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp&nbsp</label>
		<input type="text" placeholder="Enter your name" name="name" autocomplete="off"><br><br>
		<label>Contact-Number&nbsp&nbsp</label>
		<input type="text" placeholder="Enter your contact number" name="cnumber" autocomplete="off"><br><br>
		<label>Email-ID &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		<input type="text" placeholder="Enter your mail-id" name="email" autocomplete="off"><br><br>
		<label>Password  &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="password" placeholder="Enter password" name="pass"><br><br>
    <label>Confirm Password</label>
    <input type="password" placeholder="Confirm password" name="cpass"><br><br>
		<button type="submit" name="submit">Submit</button>
  </form>
</div>
</body>
</html>