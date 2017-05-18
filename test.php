<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>KingSkills</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/carousel.css">


    <link rel="stylesheet" href="css/normalizeCart.css">
		<link rel="stylesheet" href="css/maincart.css">

	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
	<?php 
  		require 'checkLogIn.php'; 	
  	?>
	<!--navbar -->
	<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Image and text -->
		<a class="navbar-brand" href="home.php">
			<img src="http://vignette2.wikia.nocookie.net/clubpenguin/images/e/e5/King%27s_Crown_clothing_icon_ID_667.png/revision/latest?cb=20141117234124" width="30" height="30" class="d-inline-block align-top" alt="King Skills Logo">
				KingSkills
		</a>

		<div class="collapse navbar-collapse" id="navbarNavDropdown">

			<!-- Implemented search (Need to use ellastic search) -->
			<form class="form-inline">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>

			<!-- nav-right-auto -->
			<ul class="nav navbar-nav ml-auto">

			<?php 
				if(!isloggedin())
				{
			?>
				<li class="nav-item active">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong">Sign-In</a>

				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalReg">
						Join
					</a>                    
				</li>

			<?php 
				}
			
				if(isloggedin())
				{
			?>		
				<li class="nav-item">
					<a class="nav-link active " href="sellerIntro.php">
						Become a seller 
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Profile
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a font-color:"blue" class="dropdown-item"> 
							<?php
								echo $_SESSION['email']; 
							?>
						</a>
						<br>
							<a class="dropdown-item" href="dashboard.php">Dashboard </a>
							<a class="dropdown-item" href="#">Update Basic Info</a>
							<a class="dropdown-item" href="#">Update Skills</a>
							<a class="dropdown-item" href="#">Orders</a>
						</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" id="cart" data-toggle="modal" data-target="#cartMoodal">
						<i class="fa fa-shopping-cart"></i>
						Cart
						<span class="badge">0</span></a>
				</li>
				<li class="nav-item active">
   			    	<a class="nav-link" href="logout.php" >Logout</a>
				</li>

			<?php
				}
			?>
			</ul>
		</div>
	</nav>
   
	<div class="container">
			<div class="row">
				<div class="col-xs-8">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-xs-6">
										<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
									</div>
									<div class="col-xs-6">
										<button type="button" class="btn btn-primary btn-sm btn-block">
											<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
								</div>
								<div class="col-xs-4">
									<h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
								</div>
								<div class="col-xs-6">
									<div class="col-xs-6 text-right">
										<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
									</div>
									<div class="col-xs-4">
										<input type="text" class="form-control input-sm" value="1">
									</div>
									<div class="col-xs-2">
										<button type="button" class="btn btn-link btn-xs">
											<span class="glyphicon glyphicon-trash"> </span>
										</button>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
								</div>
								<div class="col-xs-4">
									<h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
								</div>
								<div class="col-xs-6">
									<div class="col-xs-6 text-right">
										<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
									</div>
									<div class="col-xs-4">
										<input type="text" class="form-control input-sm" value="1">
									</div>
									<div class="col-xs-2">
										<button type="button" class="btn btn-link btn-xs">
											<span class="glyphicon glyphicon-trash"> </span>
										</button>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="text-center">
									<div class="col-xs-9">
										<h6 class="text-right">Added items?</h6>
									</div>
									<div class="col-xs-3">
										<button type="button" class="btn btn-default btn-sm btn-block">
											Update cart
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="row text-center">
								<div class="col-xs-9">
									<h4 class="text-right">Total <strong>$50.00</strong></h4>
								</div>
								<div class="col-xs-3">
									<button type="button" class="btn btn-success btn-block">
										Checkout
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')
		</script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			( function(b, o, i, l, e, r) {
					b.GoogleAnalyticsObject = l;
					b[l] || (b[l] = function() {
						(b[l].q = b[l].q || []).push(arguments)
					});
					b[l].l = +new Date;
					e = o.createElement(i);
					r = o.getElementsByTagName(i)[0];
					e.src = 'http://www.google-analytics.com/analytics.js';
					r.parentNode.insertBefore(e, r)
				}(window, document, 'script', 'ga'));
			ga('create', 'UA-XXXXX-X');
			ga('send', 'pageview');
		</script>



	<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</body>
</html>