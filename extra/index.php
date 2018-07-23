<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style type="text/css">
    /* Footer style start here*/
    section {
      padding-top: 50px;
      padding-bottom: 20px;
    }

    section .section-title {
      text-align: center;
      color: #007b5e;
      margin-bottom: 50px;
      text-transform: uppercase;
    }

    #footer {
      background: #000000 !important;
    }
    #footer h5{
    padding-left: 10px;
      border-left: 3px solid #eeeeee;
      padding-bottom: 6px;
      margin-bottom: 20px;
      color:#ffffff;
    }
    #footer a {
      color: #ffffff;
      text-decoration: none !important;
      background-color: transparent;
      -webkit-text-decoration-skip: objects;
    }
    #footer ul.social li{
    padding: 3px 0;
    }
    #footer ul.social li a i {
      margin-right: 5px;
    font-size:25px;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
    }
    #footer ul.social li:hover a i {
    font-size:30px;
    margin-top:-10px;
    }
    #footer ul.social li a,
    #footer ul.quick-links li a{
    color:#ffffff;
    }
    #footer ul.social li a:hover{
    color:#eeeeee;
    }
    #footer ul.quick-links li{
    padding: 3px 0;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
    }
    #footer ul.quick-links li:hover{
    padding: 3px 0;
    margin-left:5px;
    font-weight:700;
    }
    #footer ul.quick-links li a i{
    margin-right: 5px;
    }
    #footer ul.quick-links li:hover a i {
      font-weight: 700;
    }

    @media (max-width:767px){
    #footer h5 {
      padding-left: 0;
      border-left: transparent;
      padding-bottom: 0px;
      margin-bottom: 10px;
    }
    }
    /*footer style end here*/
   
    body{
      background-color: #f1f3f6;
    }
    ul#foot1 li{
      display: inline;
      margin-right: 30px;
    }

    /*navbar shoadow*/
    nav {
      box-shadow: 5px 4px 5px #000;
    }
    /*hover more dropdown menu*/
    .dropdown:hover>.dropdown-menu {
      display: block;
    }
    /* Make the image fully responsive */
    .carousel-inner img {
      width: 100%;
      height: 280px;
    }
    /* start here left right margin container*/
    @media (max-width: 767px) { 
      .container {
        max-width: 637px;
      }
     }
    @media (min-width: 768px) and (max-width: 991px) { 
      .container {
        max-width: 960px;
      }
     }
    @media (min-width: 992px) and (max-width: 1199px) { 
      .container {
        max-width: 1163px;
      }
     }
     @media (min-width: 1200px) and (max-width: 1366px) { 
      .container {
        max-width: 1330px;
      }
     }
     /* end here left right margin container*/
    
    /*start here wish list heart */
     a:link{
      color: gray;
      text-decoration: none;
     }
     a:visited{
      color: darkgray;
      text-decoration: none;  
     }
     a:hover{
      color: red;
      text-decoration: none;

    }
    button:focus {
      outline: 0;
    }
    /*end here wish list heart */
  </style>

</head>
<body>
  <script>
    var count = 1;
    function setColor(btn) {
        var property = document.getElementById(btn);
        if (count == 0) {
          //remove item from wishcart table 
            property.style.color = "gray";
            count = 1;        
        }else {
          // add item to wishcart table
            property.style.color = "red";
            count = 0;
        }
    }
    $(document).ready(function(){
      $("#button").click(function(e){
          e.preventDefault();  //add this line to prevent reload
          if(count == 0){
            $.ajax({type:"post", url:"addajax.php" });
          }else{
            $.ajax({type:"post", url:"removeajax.php" });
          }
      });
    });
  </script>

<!-- navbar more link hover
  <script type="text/javascript">
    $('.dropdown-toggle').dropdownHover(options);
  </script> -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar1">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a style="margin-left: 25px;" class="navbar-brand" href="#"><b>Auction</b></a>
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Login/Signup</a>
      </li>
  </ul>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar2">
    <span> <img src="search.png" height="20" width="20" alt="Search"> </span>
  </button>
    <div style="margin-left: 30px;" class="collapse navbar-collapse" id="collapsibleNavbar2">
    <ul class="navbar-nav">
      <form class="form-inline" action="/action_page.php">
        <input size="40" class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
    </ul>
  </div>
  <div style="margin-right: 30px;" class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar1">
    <ul class="navbar-nav ml-auto">
      <li class="dropdown">
          <a style="margin-right: 20px;" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false">More </a>
          <ul style="padding-left: 5px;" class="dropdown-menu">
              <li><a style="color: gray;" href="help.php">24x7 Help</a></li>
              <li><a style="color: gray;" href="advertice.php">Advertisement</a></li>
              <li><a style="color: gray;" href="downloadapp.php">Download App</a></li>
          </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>



  <!-- top main carosel slider -->
  <div style="margin-top:0px; padding-left: 0px; padding-right: 0px;" id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img1.jpg" alt="Los Angeles" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="img2.jpg" alt="Chicago" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="img3.jpg" alt="New York" width="1100" height="500">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>

  <div style="margin-top: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
    <div class="row">
      <div class="col-6">
        <h5><b>Electronics</b></h5>
      </div>
      <div class="col-6">
        <button class="float-right btn btn-info">View All</button>
      </div>
    </div>

    <div class="row">
    <div class="col-6 col-sm-3"><div class="card-body text-left">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <div class="row"> 
            <div class="col-9">
              <?php echo "striggggggggggggggggggggggggggggggggggjgng"; ?>
            </div>
            <div class="col-3">
              <button style= "border: none; color:gray; background-color: white; float: right; cursor: pointer;" id="button" name="wishlist" onclick="setColor('button');"><i class="fa fa-heart"></i></button>
            </div>
          </div>
          <?php $bp=1000; $bid=19999; if($bid == 0){echo "Base Price: "."$bp";}else{echo "Base Price: "."<del>$bp</del>";} ?><br/>
          <?php if($bid == 0){echo "Current Bid: "."0";}else{echo "Current Bid: "."$bid";} ?>  
        </div></div>
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>

    <!-- Force next columns to break to new line -->
    <!-- same view as mobile <div class="w-100"></div> -->

    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    </div>
  </div>
  <hr>

  <div style="margin-top: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
    <div class="row">
      <div class="col-6">
        <h5><b>Land & Property</b></h5>
      </div>
      <div class="col-6">
        <button class="float-right btn btn-info">View All</button>
      </div>
    </div>

    <div class="row">
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>

    <!-- Force next columns to break to new line -->
    <!-- same view as mobile <div class="w-100"></div> -->

    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    </div>
  </div>
  <hr>

  <div style="margin-top: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
    <div class="row">
      <div class="col-6">
        <h5><b>Art</b></h5>
      </div>
      <div class="col-6">
        <button class="float-right btn btn-info">View All</button>
      </div>
    </div>

    <div class="row">
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>

    <!-- Force next columns to break to new line -->
    <!-- same view as mobile <div class="w-100"></div> -->

    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    </div>
  </div>
  <hr>

  <div style="margin-top: 20px; margin-bottom: 20px; padding-top: 15px; box-shadow: 0px 0px 2px 1px #e1e2e3;" class="container card">
    <div class="row">
      <div class="col-6">
        <h5><b>Vehical</b></h5>
      </div>
      <div class="col-6">
        <button class="float-right btn btn-info">View All</button>
      </div>
    </div>

    <div class="row">
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>

    <!-- Force next columns to break to new line -->
    <!-- same view as mobile <div class="w-100"></div> -->

    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    <div class="col-6 col-sm-3"><div class="card-body text-center">
          <img src="img2.jpg" class="rounded" alt="Cinque Terre" width="100%">
          <p>Dell</p>
        </div></div>
    </div>
  </div>
  <hr>

<!-- <div class="jumbotron text-center" style="background-color: #000000; margin-bottom: 0px; ">
  <div class="row">
    <div class="col-4">
    <ul id="foot1">
      <li><a href="#">website's private policy</a></li>
      <li><a href="#">cokkies</a></li>
      <li><a href="#">leagal</a></li>
    </ul>
    </div>
    <div class="col-4">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="col-4">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>
</div> -->
<!-- Footer -->
  <section id="footer">
    <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left">
        <div class="col-4 col-xs-12 col-sm-4 col-md-4">
          <h5>Buy & Sell</h5>
          <ul class="list-unstyled quick-links"><br>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Buy on OnlineAuction</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Buyer Support</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Sell on OnlineAuction</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Seller Support</a></li>
          </ul>
        </div>
        <div class="col-4 col-xs-12 col-sm-4 col-md-4">
          <h5>Online Auction</h5><br>
          <ul class="list-unstyled quick-links">
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About Us</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Careers</a></li>
            <li><a href="#" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Blog</a></li>
          </ul>
        </div>
        <div class="col-4 col-xs-12 col-sm-4 col-md-4">
          <h5>Help</h5><br>
          <ul class="list-unstyled quick-links">
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Paymetns</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Shipping</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Cancellation & Return</a></li>
            <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
          <ul class="list-unstyled list-inline social text-center">
            <li class="list-inline-item"><a href="https://www.facebook.com/auctionindia"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="https://twitter.com/onlineauction2"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/onlineauctionindia"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="https://plus.google.com/u/1/115789311355815279811/posts"><i class="fa fa-google-plus"></i></a></li>
            <li class="list-inline-item"><a href="https://mail.google.com/mail/?view=cm&fs=1&to=onlineauctionindia@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a></li>
          </ul>
        </div>
        </hr>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
          <p><u><a href="#">National Auction Corporation</a></u> is a Registered By Indian Government</p>
          <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="#" target="_blank">Online Auction</a></p>
        </div>
        </hr>
      </div>
      <hr style="background-color: gray;">
      <div class="row">
  		<div class="col-2">
			<p>Milan Toliya</p>
  		</div>
	    <div class="col-8">
	   		<ul id="foot1" style="text-align: center;">
	          <li><a href="#">India</a></li>
	          <li><a href="#">US</a></li>
	          <li><a href="#">Japan</a></li>
	          <li><a href="#">Brazil</a></li>
	          <li><a href="#">Rusia</a></li>
	          <li><a href="#">China</a></li>
	          <li><a href="#">Australia</a></li>
	          <li><a href="#">Canada</a></li>
	          <li><a href="#">France</a></li>
	        </ul>
	    </div>
        <div class="col-2">
      		<p class="float-right">Kanji Kangad</p>
      	</div>
      </div>   
      <!-- <div class="row">
      	<div class="col-6">
      		<p>Milan Toliya</p>	
      	</div>
      	<div class="col-6">
      		<p class="float-right">Kanji Kangad</p>
      	</div>
      </div>  -->  
    </div>
  </section>
  <!-- ./Footer -->



</body>
</html>
