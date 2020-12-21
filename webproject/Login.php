<?php
include 'dbconnection.php';

if(isset($_POST['submit'])){
  $Email= $_POST['email'];
  $Password = $_POST['pass'];
  $sql = "SELECT mail_id,password FROM customer WHERE mail_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s",$Email);
  $stmt->execute();
  $stmt->bind_result($db_email,$db_pass);
  if($stmt->fetch())
  {
    $pass_decode = password_verify($Password, $db_pass);
    if ($pass_decode) {
      echo "Login Successful";
      header("location:eb.php");
    }else{ ?>
      <script> alert("Incorrect Password"); </script>
      <?php
    }
  }else { ?>
    <script> alert("Incorrect Mail-ID"); </script>
    <?php
  }
  }
?>
<html>
<head>
<title> Life Time Memories-Login Page </title>
<link rel = "stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
		 <ul> 
			 <li><a href="Home-page.html">Home</a></li>
			 <li ><a href="aboutus.html">About us</a></li>
			 <li><a href="contactus.html">Contact us</a></li>
			 <li><a href="photospage.html">Photos</a></li>
			 <li class="active"><a href="#">Login</a></li>
			 <li><a href="rev.html">Reviews</a></li>
			 <li><a href="feedback.php">Feedback</a></li>
									
		  </ul>
	   </div>
	</header>
	  <div class="container">
		<center>
		   <h1>Login Here</h1><br><br>
		   <form method="post" action="Login.php">
			<label style="color:white;">Email-ID</label>
			<input type="text" placeholder="Enter your mail-id" name="email" autocomplete="off"><br><br>
			<label style="color:white;">Password</label>
		<input type="password" placeholder="Enter password" name="pass"><br><br><br>

		<button type="submit" name="submit" style="background-color:white; border: 1px solid white;  font-family:Century Gothic; font-size:20px;  ">Submit</button>
		<h2 style="border:5px solid white; weigth:60px; border-radius:5px;">New user Sign-up here</h2>
		<a href="Register-Here.php" >
	<button type="submit" name="submit" style="background-color:white; border: 3px solid white; 
	font-family:Century Gothic; font-size:19px; 
	text-decoration:none;"><a href="Register-Here.php" style="text-decoration:none;color:black; width:50px; " >Register</a></button>
		</form>
		</center>
	 </div>
  </body>
</html>
