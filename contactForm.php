<!DOCTYPE html>
<head>
	<title>Contact Us - Ultimate Foods</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contact Us</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='contactForm.css'>
    <meta name="author" content="CPS530 Group 9 - Section 3 & 4" >
    <meta name="description" content="Ultimate Foods - CPS530 Final Project">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Scripts to enable the menu bar to collapse in mobile size -->
 	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous"></script>
</head>
<body style="overflow-x: hidden;">
    <!-- Navigation bar using Bootstrap NavBar class -->
    <!-- Source: https://getbootstrap.com/docs/4.0/components/navbar/ -->
    <!-- Followed  a youtube tutorial to set up the collapsable menu  -->
    <!-- Source: https://www.youtube.com/watch?v=23bpce-5s8I -->
	<div class="navBar">
		<nav class="navbar navbar-expand-sm custom-navbar" >
			<a href="https://scs.ryerson.ca/~vandreut/">
				<img src="platterlogo1.png" class="navbar-brand" style="height:60px; width:80px;"></img>
			</a>
			<button class="navbar-toggler custom-toggler">
				<span class="navbar-toggler-icon" data-toggle="collapse" data-target="#navbar">
				
				</span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item"></li>
					<a href="https://scs.ryerson.ca/~vandreut/menuIndex.html" class="nav-link">Menu</a>
					<a href="https://scs.ryerson.ca/~vandreut/coupons.html" class="nav-link">Coupons</a>
					<a href="https://scs.ryerson.ca/~vandreut/contactForm.html" class="nav-link">Contact Us </a>
					<a href="https://scs.ryerson.ca/~vandreut/locations.html" class="nav-link">Locations </a>
					
				</ul>			
			</div>
		</nav>
	</div><br><br><br>

    <div class="row" id="banner">
        <div class="col-lg-12">
        <p style="color: #5C2E00;">C O N T A C T &nbsp;&nbsp;&nbsp; U S </p>
        <img src="line.png" class="img-fluid" id="underline" alt="contact us" ></img>
        </div>
    </div>
    <br><br><br><br>

    <p id="contact"> <strong> Thank you for your feedback! Here is what we have recieved:</strong></p><br><br>
    

<?php
require_once 'connect.php';

// Used Concepts from Lab 6 to display information from Contact Us form and send it backend to a sql table
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$category = $_POST['category'];
$comment = $_POST['comment'];

echo "<p> <strong>NAME:</strong> ";
echo "$name </p>" ;
echo "<p> <strong> EMAIL:</strong> ";
echo "$email</p> ";
echo "<p> <strong> PHONE NUMBER:</strong> ";
echo "$phone ";
echo "<p> <strong> CATEGORY OF INQUIRY:</strong> ";
echo "$category</p>";
echo "<p> <strong> COMMENT:</strong> ";
echo "$comment</p><br><br>";

$sql = "INSERT INTO ultimateFoodsContactForm (name,email,phoneNumber,inquiryType,comment)
VALUES ('$name','$email','$phone', '$category','$comment');";

if ($conn->multi_query($sql) === TRUE) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

  <footer class="page-footer">
    <div class="container-fluid text-center" style="background-color:  #c7aa89;">
        <div class="row">
            <div class="col-md-3 mx-auto"><br><br>
                <h3 class="text-uppercase" style="color: #5C2E00;"><strong>Our Mission</strong></h3><br>
                <span style="font-size:17px; padding:none">From our ovens to your table, we pride ourselves in delivering a variety of different high quality food to you and your loved ones.</span>
            </div>
            <div class="col-md-3 mx-auto"><br><br><br>
                <img src="./platterlogo1.png" class="center-block" style="height:60px; width:80px;"></img>
                <h3 class="text-uppercase " style="color: #5C2E00; 	font-family: 'Courgette', bold; "><strong>Ultimate Foods</Strong></h3>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mx-auto"><br><br>
                <h3 class="text-uppercase" style="color: #5C2E00;"><strong>Links</strong></h3>

                <ul class="list-unstyled" style="text-align: center;">
                    <li, style="color:black">
                        <a style="color: black;font-size:20px;" href="https://scs.ryerson.ca/~vandreut/menuIndex.html">Browse the menu</a>
                    </li><br>
                    <li, style="color:black">
                        <a style="color: black;font-size:20px;" href ="https://scs.ryerson.ca/~vandreut/coupons.html">View coupons</a>
                    </li><br>
                    <li, style="color:black">
                        <a  style="color: black; font-size:20px;" href="https://scs.ryerson.ca/~vandreut/contactForm.html">Contact us</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3" style="background-color:  #c7aa89;"><em>@Copyright 2020-2021<strong>  <a style="color:black"href=".https://scs.ryerson.ca/~vandreut/"> Ultimate Foods</a></strong> All rights reserved.</em>
 
    </div>
    </footer>
</body>
</html>