<!DOCTYPE html>
<html lang="en">
  
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
   background-image: url("img/background.JPG");
   background-color: #cccccc;
   background-repeat:no-repeat;
   background-size:cover;
}

/* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 600px) {
  .navbar-inverse a:not(:first-child) {display: none;}
  .navbar-inverse a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .navbar-inverse.responsive {position: relative;}
  .navbar-inverse.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .navbar-inverse.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

</style>
  
    <head>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body >
        
    <nav id="myTopnav" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Coeliac Ireland</a>
    </div>
    <ul id="myTopnav" class="nav navbar-nav navbar-inverse">
      <li class=""><a href="index.php">Home</a></li>
      <li>
      <div class="dropdown">
        <button class="dropbtn"><a href="phone.html">Restaurants</button>
        <div class="dropdown-content">
            <a href="searchMap.html">Map</a>
            <a href="rating.php">Ratings</a>
            <a href="favo.php">Add Favourite </a>
            <a href="insertrestaurant.html">Add New Restaurant </a>
        </div>
      </div>
      </li>
      <li>
      <div class="dropdown">
        <button class="dropbtn"><a href="aboutCoeliac.php">Coeliac Disease</button>
        <div class="dropdown-content">
            <a href="phone.html">About, Treatment & Advice</a>
            <a href="quiz.php">Take The Symptoms Quiz</a>
        </div>
      </div>
      </li>
      <li><a href="test.html">Tesco Products</a></li>
      <li><a href="phone.html">Travel Cards</a></li>
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
 
    </body>
    
    <script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navbar-inverse") {
        x.className += " responsive";
    } else {
        x.className = "navbar-inverse";
    }
}
</script>
</html>

