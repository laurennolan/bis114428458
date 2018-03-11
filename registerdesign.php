<?php 
	require_once("functions.php");
	require_once("db-const.php");
	session_start();
	if (logged_in() == true) {
		redirect_to("profile.php");
	}
?>
<html lang="en">
  
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
</style>
  
    <head>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body >
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

<!-- The HTML registration form -->
<div class="col-lg-4 col-lg-offset-2 border-box">
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
     <p id="title">Please Register</p>
	<label>Username: </label> <input id="enter" type="text" name="username" /><br />
	<label>Password: </label> <input id="enter" type="password" name="password" /><br />
    <label>First name: </label> <input id="enter" type="text" name="first_name" /><br />
    <label>Last name: </label> <input id="enter" type="text" name="last_name" /><br />
    <label>Email: </label>            <input id="enter" type="text" name="email" /><br />
    <label>Town/City: </label> <input id="enter" type="text" name="towncity" /><br />
    <label>County: </label> <input id="enter" type="text" name="county" /><br />
	<input id="submit" type="submit" name="submit" value="Register" />
	<a href="login.php">I already have an account...</a>
</form>
</div>


<?php
if (isset($_POST['submit'])) {
## connect mysql server
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
## query database
	# prepare data for insertion
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$first_name	= $_POST['first_name'];
	$last_name	= $_POST['last_name'];
	$email		= $_POST['email'];
	$towncity	= $_POST['towncity'];
	$county		= $_POST['county'];
 
	# check if username and email exist else insert
	// u = username, e = emai, ue = both username and email already exists
	$exists = "";
	$result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists .= "u";
	}	
	$result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists .= "e";
	}
 
	if ($exists == "u") echo "<p><b>Error:</b> Username already exists!</p>";
	else if ($exists == "e") echo "<p><b>Error:</b> Email already exists!</p>";
	else if ($exists == "ue") echo "<p><b>Error:</b> Username and Email already exists!</p>";
	else {
		# insert data into mysql database
		$sql = "INSERT  INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`,`towncity`,`county`) 
				VALUES (NULL, '{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}', '{$towncity}', '{$county}')";
 
		if ($mysqli->query($sql)) {
			redirect_to("login.php?msg=Registred successfully");
		} else {
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
	}
}
?>	
</body>
</html>