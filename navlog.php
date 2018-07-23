
<!-- navbar more link hover
  <script type="text/javascript">
    $('.dropdown-toggle').dropdownHover(options);
  </script> -->
<nav style="box-shadow: 0px 0px 16px 4px #1E1D1C;" class="navbar navbar-expand-md fixed-top bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar1">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a style="margin-left: 25px;" class="navbar-brand" href="index.php"><b>Auction</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar2">
    <span> <img src="icon/search.png" height="20" width="20" alt="Search"> </span>
  </button>
    <div style="margin-left: 30px;" class="collapse navbar-collapse" id="collapsibleNavbar2">
    <ul class="navbar-nav">
      <form class="form-inline" action="">
        <input size="40" class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
    </ul>
  </div>
  <div style="margin-right: 30px;" class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar1">
    <ul class="navbar-nav ml-auto">
      <li class="dropdown">
          <a style="margin-right: 20px;" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false"> <?php echo $_SESSION['us']; ?> </a>
          <ul style="padding-left: 5px;" class="dropdown-menu">
              <li><a style="color: gray;" href="profile.php">Profile</a></li>
              <li><a style="color: gray;" href="auctions.php">Your Auctions</a></li>
              <li><a style="color: gray;" href="orders.php">Orders</a></li>
              <li><a style="color: gray;" href="wishlist.php">Wishlist</a></li>
              <li><a style="color: gray;" href="cart.php">Cart</a></li>
              <li><a style="color: gray;" href="logout.php">Logout</a></li>
          </ul>
      </li>
      <li class="dropdown">
          <a style="margin-right: 20px;" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false">More </a>
          <ul style="padding-left: 5px;" class="dropdown-menu">
              <li><a style="color: gray;" href="help.php">24x7 Help</a></li>
              <li><a style="color: gray;" href="advertice.php">Advertisement</a></li>
              <li><a style="color: gray;" href="downloadapp.php">Download App</a></li>
          </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
    </ul>
  </div>
</nav>