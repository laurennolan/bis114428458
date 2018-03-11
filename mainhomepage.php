<!DOCTYPE html>
<html lang="en">

<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  <meta charset="utf-8">
  <title>Coeliac Web</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Bell
    Theme URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
  <!-- Page Content
    ================================================== -->
  <!-- Hero -->

  <section class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <a class="hero-brand" href="index.html" title="Home"><img alt="" src="img/gluten.png"></a>
        </div>
      </div>

      <div class="col-md-12">
        <h1>
            Coeliac Ireland
          </h1>

        <p class="tagline">
          A Guide to Healthy Gluten Free Eating in Ireland
        </p>
        
      </div>
    </div>
    

  </section>
   

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
          center: new google.maps.LatLng(51.8980, -8.4737),
          zoom: 16
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
                
              });
              
          
             
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
    
  <!-- /Hero -->

  <!-- Header -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.html"><img src="" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#about">Map</a></li>
		  <li class="menu-has-children"><a href="#parallex-bg">Coeliac Disease</a>
            <ul>
              <li><a href="#parrallex-bg">About</a></li>
              <li><a href="#P2">Recently Diagnosed?</a></li>
              <li><a href="#P3">Treatment & Advice</a></li>
            </ul>
          </li>
          <li><a href="#portfolio">Products</a></li>
          <li><a href="#features">Recipes</a></li>
          <li><a href="#team">Travel Cards</a></li>
          <li><a href="#contact">Contact Us</a></li>
		  <li><a href='#'>My Shopping List</a></li>
		  <li><a href="#">Sign Up</a></li>
		  <li><a href="#">Login</a></li>
        </ul>
		
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>
    </div>
  </header>
  <!-- #header -->

  <!-- About -->

  <section class="about" id="about">
    <div class="container text-center">
      <h2>
          Browse Ceoliac Friendly Restaurants 
        </h2>

<div id="map"></div>

      
  </section>
  <!-- /About -->
  <!-- Parallax -->
  <section class="parallex-bf" id="parallex-bg">
  <div class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="img/food.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
    <h2>
        Coeliac Disease!
      </h2>
	<p>
	Coeliac disease is a auto-immune disease causing some adults and children to react to the gluten, the protein found in wheat, barley and rye. Gluten is in bread, biscuits, cakes, pasta, beer, pizza and in many manufactured foods where gluten is contained in the ingredients such as soups, sauces, gravy, salad dressings, crisps, chocolate, sweets and ready-meals.
	</p>
    <p>
     Signs and Symptoms of coeliac disease vary from person to person and may be constant or only occur from time to time.
	 Some people may also experience an itchy rash which can be caused by an associated condition called Dermatitis Herpetiformis.
	</p>
	<p>
      Is it Coeliac Disease? <a href="#">Click Here to Complete an Assesment</a>
    </p>
    <img alt="" class="gadgets-img hidden-md-down" src="">
  </div>
  <!-- /Parallax -->
  
  <!-- Parallax -->
  <section class="P2" id="P2">
  <div class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="img/food.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
    <h2>
        Recently Diagnosed?
      </h2>

    <p>
      Just been diagnosed with coeliac disease? <b> Living Gluten Free </b> is the only way you can counteract the ill effects of coeliac disease. Here are some suggestions to help you start your new gluten free healthy life!
    </p>
	<p> <b>Looking at all the Positives</b>
	<ul>
  <li>You don’t have to take daily medication just yummy, healthy food!</li>
  <li>There is lots of foods that are naturally gluten free such as meat, fruit and veg and dairy</li>
  <li>You can wow your family and friends with your new interest in food!</li>
  <li>You will discover new foods that you enjoy – Kale who knew!</li>
  <li>It’s a great conversation starter everyone loves talking about food!</li>
	</ul>
	</p>



    <img alt="" class="gadgets-img hidden-md-down" src="">
  </div>
  <!-- /Parallax -->
  
  <!-- Parallax -->
  <section class="P3" id="P3">
  <div class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="img/food.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
    <h2>
        Treatment & Advice
      </h2>

    <p>
      Currently, the only treatment for celiac disease is lifelong adherence to a strict gluten-free diet. People living gluten-free must avoid foods with wheat, rye and barley, such as bread and beer. Ingesting small amounts of gluten, like crumbs from a cutting board or toaster, can trigger small intestine damage.
    </p>
	
	<h3>Undiagnosed or untreated celiac disease can lead to:
	</h3>
<p>
<ul>
<li>Long-Term Health Conditions</li>
<li>Iron deficiency anemia</li>
<li>Early onset osteoporosis or osteopenia</li>
<li>Infertility and miscarriage</li>
<li>Lactose intolerance</li>
<li>Vitamin and mineral deficiencies</li>
<li>Central and peripheral nervous system disorders</li>
</ul>


	</p>
    <img alt="" class="gadgets-img hidden-md-down" src="">
  </div>
  <!-- /Parallax -->
  <!-- Features -->

  <section class="features" id="features">
    <div class="container">
      <h2 class="text-center">
          Recipes
        </h2>

      <div class="row">
        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-pencil"></span>
              </div>
            </div>

            <div>
              <h3>
                  XXX
                </h3>

              <p>
                Link to recipe
              </p>
            </div>
          </div>
        </div>

        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-cutlery"></span>
              </div>
            </div>

            <div>
              <h3>
                  XXX
                </h3>

              <p>
                Link to recipe
              </p>
            </div>
          </div>
        </div>

        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-pencil"></span>
              </div>
            </div>

            <div>
              <h3>
                  XXX
                </h3>

              <p>
                Link to recipe
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-cutlery"></span>
              </div>
            </div>

            <div>
              <h3>
                  XXX
                </h3>

              <p>
                Link to recipe
              </p>
            </div>
          </div>
        </div>

        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-pencil"></span>
              </div>
            </div>

            <div>
              <h3>
                  XXX
                </h3>

              <p>
                Link to recipe
              </p>
            </div>
          </div>
        </div>

        <div class="feature-col col-lg-4 col-xs-12">
          <div class="card card-block text-center">
            <div>
              <div class="feature-icon">
                <span class="fa fa-cutlery"></span>
              </div>
            </div>

            <div>
              <h3>
                  XXX
                </h3>

              <p>
                Link to recipe
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Features -->
  <!-- Call to Action -->

  <section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-sm-12 text-lg-left text-center">
          <h2>
              
            </h2>

          <p>
          
          </p>
        </div>

        <div class="col-lg-3 col-sm-12 text-lg-right text-center">
          <a class="btn btn-ghost" href="#"></a>
        </div>
      </div>
    </div>
  </section>
  <!-- /Call to Action -->
  <!-- Portfolio -->

  <section class="portfolio" id="portfolio">
    <div class="container text-center">
      <h2>
          Products
        </h2>

      <p>
        
      </p>
    </div>

    <div class="portfolio-grid">
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="#"><img alt="" src="img/porf-1.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                   
                  </h3>

                  <p class="card-text">
                 
                  </p>
                </div>
              </div></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="#"><img alt="" src="img/porf-2.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                 
                  </h3>

                  <p class="card-text">
                    
                  </p>
                </div>
              </div></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="#"><img alt="" src="img/porf-3.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                  
                  </h3>

                  <p class="card-text">
                    
                  </p>
                </div>
              </div></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="#"><img alt="" src="img/porf-4.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                   
                  </h3>

                  <p class="card-text">
                    
                  </p>
                </div>
              </div></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="#"><img alt="" src="img/porf-5.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    
                  </h3>

                  <p class="card-text">
                    
                  </p>
                </div>
              </div></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="#"><img alt="" src="img/porf-6.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    
                  </h3>

                  <p class="card-text">
                    
                  </p>
                </div>
              </div></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="#"><img alt="" src="img/porf-7.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    
                  </h3>

                  <p class="card-text">
                   
                  </p>
                </div>
              </div></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="#"><img alt="" src="img/porf-8.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    
                  </h3>

                  <p class="card-text">
                 
                  </p>
                </div>
              </div></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Portfolio -->
  <!-- Team -->

  <section class="team" id="team">
    <div class="container">
      <h2 class="text-center">
          Show This to Your Server to Let Them Know Your Dietry Needs!
        </h2>

      <div class="row">
        <div class="col-sm-3 col-xs-6">
          <div class="card card-block">
            <a href="#features"><img alt="" class="team-img" src="img/english.png">
              <div class="card-title-wrap">
                <span class="card-title">English</span> <span class="card-text">Travel Card</span>
              </div>

              <div class="team-over">
                <h4 class="hidden-md-down">
                  UK, USA, Ireland
                </h4>

                <nav class="social-nav">
                  <a href="#features"></a> 
            </nav>

            <p>
              
            </p>
          </div>
          </a>
        </div>
      </div>

      <div class="col-sm-3 col-xs-6">
        <div class="card card-block">
          <a href="#"><img alt="" class="team-img" src="img/french.png">
              <div class="card-title-wrap">
                <span class="card-title">French</span> <span class="card-text">Travel Card</span>
              </div>

              <div class="team-over">
                <h4 class="hidden-md-down">
                  France
                </h4>

                <nav class="social-nav">
                  <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
          </nav>

          <p>
            Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
          </p>
        </div>
        </a>
      </div>
    </div>

    <div class="col-sm-3 col-xs-6">
      <div class="card card-block">
        <a href="#"><img alt="" class="team-img" src="img/spanish.png">
              <div class="card-title-wrap">
                <span class="card-title">Spanish</span> <span class="card-text">Travel Card</span>
              </div>

              <div class="team-over">
                <h4 class="hidden-md-down">
                  Spain
                </h4>

                <nav class="social-nav">
                  <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
        </nav>

        <p>
          Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
        </p>
      </div>
      </a>
    </div>
    </div>

    <div class="col-sm-3 col-xs-6">
      <div class="card card-block">
        <a href="#"><img alt="" class="team-img" src="img/chinese.jpg">
              <div class="card-title-wrap">
                <span class="card-title">Chinese</span> <span class="card-text">Travel Card </span>
              </div>

              <div class="team-over">
                <h4 class="hidden-md-down">
                  China
                </h4>

                <nav class="social-nav">
                  <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
        </nav>

        <p>
          Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
        </p>
      </div>
      </a>
    </div>
    </div>
    </div>
    </div>
  </section>
  <!-- /Team -->
  <!-- @component: footer -->

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="section-title">Contact Us</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>College Road<br>Cork</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>info@coeliaccork.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>0801234567</p>
            </div>

          </div>
        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-left text-center">
            
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bell
              -->
            </div>
          </div>

          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="index.html">Home</a>
              </li>

              <li class="list-inline-item">
                <a href="#about">Map</a>
              </li>

              <li class="list-inline-item">
                <a href="#features">Coeliac Disease</a>
              </li>

              <li class="list-inline-item">
                <a href="#portfolio">Products</a>
              </li>

              <li class="list-inline-item">
                <a href="#team">Recipes</a>
              </li>

              <li class="list-inline-item">
                <a href="#contact">Contact</a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>


  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/tether/js/tether.min.js"></script>
  <script src="lib/stellar/stellar.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/easing/easing.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/lockfixed/lockfixed.min.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>

</body>
</html>
