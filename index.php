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
   background-image: url("img/");
   background-color: #cccccc;
   background-repeat:no-repeat;
   background-size:cover;
}

#title{
 font-size: 25px;
 color: #00b3b3;   
}

#buttonGet{
    height: 40px;
    width: 100px;
    background-color: #00b3b3;
    color: white;
    font-size: 17px;
    outline: none !important;
   box-shadow: none;
   margin-left: 20px;
}

#textSearch {
    height: 40px;
    width: 300px;
    border-radius: 50px;
    outline: none !important;
    box-shadow: none;

}
/* Add a black background color to the top navigation */
.topnav {
    background-color: #00b3b3;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}



/* Add an active class to highlight the current page */
.active {
    background-color: #4CAF50;
    color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
    display: none;
}

/* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 2000px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 2000px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

body {
   background-image: url("img/mobile.JPG");
   background-color: #cccccc;
   background-repeat:no-repeat;
   background-size:cover;
}
.border-box {
    border: 1px navy; 
    background:rgba(260, 260, 260, 0.7);
    margin-top: 50px;
}


</style>
    <head>
        <title>TEST</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="testjs.js"></script>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
     
       <div class="topnav" id="myTopnav">
  <a href="#" class="">Coeliac Ireland</a>
  <a href="#" class="">Home</a>
  <a href="searchMap.html">Restaurants</a>
  <a href="aboutCoeliac.html">Coeliac Disease</a>
  <a href="test.html">Tesco Products</a>
  <a href="phone.html">Travel Cards</a>
  
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>
     
    </body>
    <script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</html>