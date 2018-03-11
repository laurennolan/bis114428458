<?php 
require_once("functions.php");
require_once("db-const.php");
session_start();
if (logged_in() == false) {
	redirect_to("login.php");
} else {
?>
 
<html>
	<link href="/css/bootstrap.css" rel="stylesheet">
		 <style>
 .navbar-inverse, .navbar
 {
     background-color: #00b3b3 !important;
     border: 0px !important;
     color: white !important;
      font-size: 17px;
 }
 .navbar-inverse li, a
 {
     color: white !important;
 }
 
/* Style The Dropdown Button */
.dropbtn {
    background-color: #00b3b3;
    color: white;
    padding-top: 13px;
    font-size: 17px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    color: black !important;
    background-color: #00b3b3;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover, li:hover {
 color: black !important;   
 text-decoration: none;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: white}


/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #00b3b3;
}

body {
   background-image: url("img/");
   background-color: #cccccc;
   background-repeat:no-repeat;
   background-size:cover;
}

#logout{
 color:black;
}
</style>
 
<head>
  <link href="/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Profile</title>
	<script src="script.js" type="text/javascript"></script><!-- put it on user area pages -->
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Coeliac Ireland</a>
    </div>
    <ul class="nav navbar-nav navbar-inverse">
      <li class=""><a href="index.php">Home</a></li>
      <li>
      <div class="dropdown">
        <button class="dropbtn"><a href="maps.php">Restaurants</button>
        <div class="dropdown-content">
            <a href="maps.php">Map</a>
            <a href="index.php">Ratings</a>
            <a href="insertrestaurant.html">Add New Restaurant </a>
        </div>
      </div>
      </li>
      <li>
      <div class="dropdown">
        <button class="dropbtn"><a href="maps.php">Coeliac Disease</button>
        <div class="dropdown-content">
            <a href="aboutCoeliac.html">About, Treatment & Advice</a>
            <a href="quiz.php">Take The Syptoms Quiz</a>
        </div>
      </div>
      </li>
      <li><a href="products.html">Tesco Products</a></li>
      <li><a href="travelCard.html">Travel Cards</a></li>
    </ul>
    <form class="navbar-form navbar-left">
  
</form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href='contact.html'><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span>My Profile</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
  </nav>
  <div class="col-md-2 hidden-xs">
<img src="https://openclipart.org/download/190113/1389952697.svg" class="img-responsive img-thumbnail ">
  </div>
<?php
	if (isset($_GET['id']) && $_GET['id'] != "") {
		$id = $_GET['id'];
	} else {
		$id = $_SESSION['user_id'];
	}
 
	## connect mysql server
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		# check connection
		if ($mysqli->connect_errno) {
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
	## query database
		# fetch data from mysql database
		$sql = "SELECT * FROM users WHERE id = {$id} LIMIT 1";
 
		if ($result = $mysqli->query($sql)) {
			$user = $result->fetch_array();
		} else {
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
 
		if ($result->num_rows == 1) {
			# calculating online status
			if (time() - $user['status'] <= (5*60)) { // 300 seconds = 5 minutes timeout
				$status = "Online";
			} else {
				$status = "Offline";
			}
 
			# echo the user profile data
			echo "<p>User ID: {$user['id']}</p>";
			echo "<p>Username: {$user['username']}</p>";
			echo "<p>Town/City: {$user['towncity']}</p>";
			echo "<p>County: {$user['county']}</p>";
			echo "<p>Status: {$status}</p>";			
		} else { // 0 = invalid user id
			echo "<p><b>Error:</b> Invalid user ID.</p>";
		}
}
 
// showing the login & register or logout link
if (logged_in() == true) {
	echo '<a href="logout.php">Log Out</a>';
} else {
	echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
}
?>

</body>
</html>