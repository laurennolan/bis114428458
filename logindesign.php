<?php 
	require_once("functions.php");
	require_once("db-const.php");
	session_start();
	if (logged_in() == true) {
		redirect_to("profile.php");
	}
?>
<html>
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
   background-image: url("img/citybackground.jpg");
   background-color: #cccccc;
   background-repeat:no-repeat;
   background-size:cover;
}
#submit{
    height: 40px;
    width: 150px;
    background-color: #00b3b3;
    color: white;
    font-size: 17px;
    outline: none !important;
   box-shadow: none;
   margin-left: 20px;
   border: none !important;
}

.border-box {
    border: 1px ; 
    background:rgba(260, 260, 260, 0.8);
    margin-top: 50px;
}

#title{
 font-size: 25px;
 color: #00b3b3;   
}
#enter {
    height: 40px;
    width: 300px;
    border-radius: 50px;
    outline: none !important;
    box-shadow: none;

}
#link
{
   color:aqua;
   text-decoration: none; 
   background-color: none;
}


</style>
 
<head>
	<link href="/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  </nav>

<!-- The HTML login form -->
<div class="col-lg-4 col-lg-offset-2 border-box">
	<form  action="<?=$_SERVER['PHP_SELF']?>" method="post">
	    <p id="title">Enter Login Details</p>
	<label id="">	Username: </label> <input id="enter" type="text" name="username" /><br />
	<label id="">	Password: </label> <input id="enter" type="password" name="password" /><br />
	<label id="">	Remember me: </label> <input type="checkbox" name="remember" /><br />

		<input id="submit" type="submit" class="btn btn-success btn-send" name="submit" value="Login" />
		<a href="forgot.php">Forgot Password?</a>
		<a href="register.php">Register</a>
	</form>
</div>
	
<?php
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// processing remember me option and setting cookie with long expiry date
	if (isset($_POST['remember'])) {	
		session_set_cookie_params('604800'); //one week (value in seconds)
		session_regenerate_id(true);
	} 

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}

	$sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
	$result = $mysqli->query($sql);

	if ($result->num_rows != 1) {
		echo "<p><b>Error:</b> Invalid username/password combination</p>";
	} else {
		// Authenticated, set session variables
		$user = $result->fetch_array();
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['username'] = $user['username'];
		$_SESSION['towncity'] = $user['towncity'];
		$_SESSION['county'] = $user['county'];

		// update status to online
		$timestamp = time();
		$sql = "UPDATE users SET status={$timestamp} WHERE id={$_SESSION['user_id']}";
		$result = $mysqli->query($sql);

		redirect_to("profile.php?id={$_SESSION['user_id']}");
		// do stuffs
	}
}

if(isset($_GET['msg'])) {
	echo "<p style='color:red;'>".$_GET['msg']."</p>";
}
?>	

</body>
</html>