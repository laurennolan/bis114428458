<!DOCTYPE html >
 <style>
/*global $*/
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
</style>
  

  <head>
       <link href="/css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Google Maps</title>
     <link href="/css/bootstrap.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script> 
    $( "#searchButton" ).click(function() {
      $("#map").hide();
      $("#bigmap").show();
});
   </script>
    <style>
   /* Code below is based on GOOGLE MAPS API https://developers.google.com/maps/documentation/javascript/mysql-to-maps*/
      #map {
        height: 100%;
      }
      
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
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
            <a href="searchMap.html">Map</a>
            <a href="rating.php">Ratings</a>
            <a href="insertrestaurant.html">Add New Restaurant </a>
            <a href="maps.html">Cork City</a>
            <a href="dublinMap.html">Dublin City</a>
            <a href="galwayMap.html">Galway City</a>
            <a href="limerickMap.html">Limerick City</a>
            <a href="belfastMap.html">Belfast City</a>
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
  
  
    <div id="map"></div>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(53.3498,-6.2603),
          zoom: 13
        });
        var infoWindow = new google.maps.InfoWindow;

          downloadUrl('locator.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var url = markerElem.getAttribute('url');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
              
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name 
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text)
              

              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label,
                url: url

              });
              
              marker.addListener('mouseover', function() {      
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
                console.log("marker click, this.url="+this.url);
                //if (!this.url == null) {
                //window.open(this.url);
                //}
                
              })
             
               marker.addListener('click', function() {      
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
                console.log("marker click, this.url="+this.url);
                //if (!this.url == null) {
                window.open(this.url);
                //}
               }); 
              
            });
          });
        }


      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEiawuuZPOw3mzUPURtq18HaGEeSqb1gE&callback=initMap">
    </script>
    
     
    
  </body>
</html>

