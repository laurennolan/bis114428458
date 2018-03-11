<?php
//index.php
?>
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
   background-image: url("img/");
   background-color: #cccccc;
   background-repeat:no-repeat;
   background-size:cover;
}

#title1{
     font-size: 30px;
    color: #00b3b3;
}

</style>
</style>
 <head>
  <title id="title">Please Rate The Restaurants Here According To Their Glutenfree-ness</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
  
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
  
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
      <li><a href='contact.html'><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  </nav>
  
  <div class="container" style="width:800px;">
   <h2 id="title1" align="center">Please Rate How Coeliac-Friendly A Restaurant Is!</h2>
   <br />
   <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search restaurant..." />
        <div class="result"></div>
    </div>
   <br />
   <br />
   <span id="business_list"></span>
   <br />
   <br />
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 
 load_business_data();
 
 function load_business_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
  $('#business_list').html(data);
   }
  });
 }
 
 $(document).on('mouseenter', '.rating', function(){
  var index = $(this).data("index");
  var business_id = $(this).data('business_id');
  remove_background(business_id);
  for(var count = 1; count<=index; count++)
  {
   $('#'+business_id+'-'+count).css('color', '#ffcc00');
  }
 });
 
 function remove_background(business_id)
 {
  for(var count = 1; count <= 5; count++)
  {
 $('#'+business_id+'-'+count).css('color', '#ccc');
  }
 }
 
 $(document).on('mouseleave', '.rating', function(){
  var index = $(this).data("index");
  var business_id = $(this).data('business_id');
  var rating = $(this).data("rating");
  remove_background(business_id);
  //alert(rating);
  for(var count = 1; count<=rating; count++)
  {
 $('#'+business_id+'-'+count).css('color', '#ffcc00');
  }
 });
 
 $(document).on('click', '.rating', function(){
  var index = $(this).data("index");
  var business_id = $(this).data('business_id');
$.ajax({
   url:"insert_rating.php",
   method:"POST",
   data:{index:index, business_id:business_id},
   success:function(data)
   {
    if(data == 'done')
    {
     load_business_data();
     alert("You have rate "+index +" out of 5");
    }
    else
    {
     alert("There is some problem in System");
    }
   }
  });
  
 });

});
</script>
