<!DOCTYPE html>
<html>
    <style>
  /* Style The Dropdown Button */
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
    width: 200px;
    background-color: #00b3b3;
    color: white;
    font-size: 17px;
    outline: none !important;
   box-shadow: none;
   margin-left: 20px;
}

#title{
    font-size: 25px;
    color: #00b3b3;
}
.border-box { 
    border: 2px solid navy; 
    background:rgba(260, 260, 260, 0.7); 
    margin-top: 50px; 
}
</style>
  
    <head>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Experiencing Coeliac Symptoms? Take Our Quiz</title>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic' rel='stylesheet' type='text/css'>
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
            <a href="searchMap.html">Search</a></a>
            <a href="rating.php">Ratings</a>
            <a href="insertrestaurant.html">Add New Restaurant </a>
        </div>
      </div>
      </li>
      <li>
      <div class="dropdown">
        <button class="dropbtn"><a href="aboutCoeliac.php">Coeliac Disease</button>
        <div class="dropdown-content">
            <a href="aboutCoeliac.html">About, Treatment & Advice</a>
            <a href="quiz.php">Take The Symptoms Quiz</a>
        </div>
      </div>
      </li>
      <li><a href="test.html">Tesco Products</a></li>
      <li><a href="travelCard.html">Travel Cards</a></li>
    </ul>
    <form class="navbar-form navbar-left">

</form>
    <ul class="nav navbar-nav navbar-right">
      <li>
      <div class="dropdown">
        <button class="dropbtn"><a href='contactGeneral.html'><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></button>
        <div class="dropdown-content">
            <a href="contact.html">Add a Restaurant</a>
            <a href="contactGeneral.html">General Enquiry</a>
        </div>
      </div>
      </li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  </nav>
    <div class="col-md-4"></div>   
    <div id="page-wrap" class="col-md-4 border-box">
        <form id="start-quiz" method="post" action="test.php">
            <div class="overlay index">
            <div class="quiz-overlay"></div>
	        <h1 id="title" class="index-headline">Experiencing Coeliac Symptoms? Take Our Quiz</h1>
                <input type="submit" id="submit" class=" btn take-quiz-btn index-btn" value="Take The Quiz" />
            </div>    
        </form>
    </div>	   
      <div class="col-md-4"></div> 
</body>
</html>
