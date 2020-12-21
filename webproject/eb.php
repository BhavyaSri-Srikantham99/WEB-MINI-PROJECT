<?php 
include 'dbconnection.php';
if(isset($_POST['submit']))
{

    $Date = $_POST['date'];
    $Event = $_POST['event'];
    $city = $_POST['city'];
    $venue = $_POST['venue'];
    $time = $_POST['time'];

    
    $sql = "INSERT INTO events(Date,Event,City,Venue,Time) VALUES(?,?,?,?,?)";

    //preparing the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsssi",$Date,$Event,$city,$venue,$time);
    $result = $stmt->execute();

    if($result)
    {
      header("location:booking-success.html");
       
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Life Time Memories-Booking Page</title>
  <link rel = "stylesheet" type="text/css" href="eb.css">
</head>
<body>
<ul> 
			 <li><a href="Home-page.html">Home</a></li>
			 <li ><a href="aboutus.html">About us</a></li>
			 <li><a href="contactus.html">Contact us</a></li>
			 <li><a href="photospage.html">Photos</a></li>
			 <li><a href="Login.php">Login</a></li>
			 <li><a href="rev.html">Reviews</a></li>
       <li><a href="feedback.php">Feedback</a></li>
			  </ul>
	   </div>
	</header>
	  <div class="container">
		<center>
            <h1>Book Your Events</h1>
            <form method="post" action="eb.php" id="form1">
            <label for="fname">Date</label>
            <input type="date" id="fname" name="date">
            <p>Please select your Event</p>
            <label for="cars">Event:</label>
            <select name="event" id="events">
            <option value="Select">Select</option>
            <option value="Marriage">  Marriage-₹2lacs*</option>
            <option value="BirthDay"> BirthDay-₹10,000*</option>
            <option value="Engagement"> Engagement-₹50,000*</option>
            <option value="Convocation"> Convocation-₹30,000*</option>
            <option value="Business Meeting"> Business Meeting-₹50,000*</option>
         </select>
            <h4>*Prices may vary based on the decoration/needs of the customer </h4>
            <label for="cars">City :</label>
            <select name="city" id="events">
            <option value="Select">Select</option>
            <option value="Bangalore-01">Bangalore</option>
            <option value="Mysore-02">Mysore</option>
            <option value="Hydrabad-03">Hydrabad</option>
            <option value="Vishakapattanam-04">Vishakapattanam</option>
            <option value="chennai-05">Chennai</option>
         </select>
       <br><br>
      <label for="fname">Venue</label>
      <input type="text" id="fname" name="venue" autocomplete="off"><br><br>
      <label for="fname">Time</label>
       <input type="time" id="fname" name="time"><br><br><br>
       <a href="booking-success.html" class="btn"><button type="submit" name="submit">Confirm Booking</button>
     	</form>  
		</center>
	 </div> 
</body>
</html>