<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>KingSkills</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/carousel.css">


    
	<style type="text/css">
			.carousel-inner img {
   				width: 100%; /* Set width to 100% */
      			min-height:450px;
  			}
        
        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
          .carousel-caption {
            display: none; 
            }

	</style>
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
					<a class="nav-link active " href="seller_profile_form.php">
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
					<a class="nav-link" href="viewCart.php" id="cart" data-toggle="modal" data-target="#cartMoodal">	
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
   
	<!-- Modal login -->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog login animated">
	    <div class="modal-content">
			
	        <div class="modal-header">
                	<h4 class="modal-title">Sign-in with</h4>
                	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                        
            </div>
	    
	    	<div class="modal-body">
	      			<div class="box">
                        <div class="content">
                            <div class="social">
                                <a class="circle github" href="#">
                                    <i class="fa fa-github fa-fw"></i>
                                </a>
                                <a id="google_login" class="circle google" href="#">
                                    <i class="fa fa-google-plus-official" aria-hidden="true"></i>
                                </a>
                                <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                                        <i class="fa fa-facebook fa-fw"></i>
                                </a>
                        	</div>
                             
                            <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                            </div>
                            <div class="error"></div>
                            
                            <div class="form loginBox">
                                <form method="POST" action="signIn.php" accept-charset="UTF-8">
                            	    <p>
                            	    <input id="email" class="form-control" type="text" placeholder="Email" name="email" required="true">
                            	    
                            	    </p>
                            	    <p>
                            	    <input id="password" class="form-control" type="password" placeholder="Password" name="password" required="true">
                            	    
                            	    </p>
                            	    <p>
                            	    <input class="btn btn-default btn-login" type="submit" value="Login" name="commit" >
                            	    
                            	    </p>
                                </form>
                            </div>
                        </div>
                    </div>                    
	        </div>

	      <div class="modal-footer">
	        <div class="forgot login-footer">
                <span>Looking to 
                    <a href="javascript: showRegisterForm();">
                       	create an account
                    </a>
                        ?
                </span>
            </div>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal Register -->
	<div class="modal fade" id="exampleModalReg" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog login animated">

	    <div class="modal-content">
	        <div class="modal-header">
                	<h4 class="modal-title">Join Us by:</h4>
                	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                        
            </div>
	    
	    	<div class="modal-body">
	      			<div class="box">
                        <div class="content">
                            <div class="social">
                                <a class="circle github" href="/auth/github">
                                    <i class="fa fa-github fa-fw"></i>
                                </a>
                                <a id="google_login" class="circle google" href="/auth/google_oauth2">
                                    <i class="fa fa-google-plus-official" aria-hidden="true"></i>
                                </a>
                                <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                                        <i class="fa fa-facebook fa-fw"></i>
                                </a>
                        	</div>
                             
                            <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                            </div>
                            <div class="error"></div>
                            
                            <div class="form loginBox">
                                <form action = "registerUser.php" method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                                    <p><input id="username" name="username" class="form-control"  placeholder="Username" name="username" required></p>
                                    <p>
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email" required></p>
                                    <p>
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="pass" required></p>
                                    <!--<input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="pass_c" required>-->
                                    <input class="btn btn-default btn-register" id="enter" type="submit" value="Create account" name="commit">
                            
                                    <div id="error"></div>
                                </form>
                            </div>                            
                        </div>
                    </div>
	        </div>

	         <div class="modal-footer">
	            <div class="forgot login-footer">
                        <span>Already have an account? 
                          <a href="javascript: showLoginForm(); ">Login</a>  
                        </span>
                </div>                    
	         </div>
	    </div>
	  </div>
	</div>


	 <div id="myCarousel" class="carousel slide" data-ride="carousel">
     	<ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
     	<div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
        <!-- <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">-->
        <img class="first-slide" src="img/1.jpeg" alt="First slide">
        </div>
        <div class="carousel-item">
          <!--<img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">-->
          <div class="container">
            <div class="carousel-caption d-none d-md-block">
              <h2>The goal as a company is to have customer service that is not just the best, but legendary.</h2>
              <h5>
              	Check out the blog to know more
              </h5>
              <p><a class="btn btn-lg btn-primary" href="blog.html" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
        <img class="third-slide" src="img/2.jpg" alt="Second slide">
          <
          <!--<img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">-->
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-right">
              </div>
          </div>
        </div>
      </div>
      	<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      	<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

	
	<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    	<div class="row">
        	<div class="col-lg-4">
          <img class="rounded-circle" src="http://tech.chitgoks.com/wp-content/uploads/2015/08/programmer.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Programming and Tech</h2>
          <p>welcome</p>
        </div><!-- /.col-lg-4 -->
        	<div class="col-lg-4">
          <img class="rounded-circle" src="http://www.smart-kit.com/wp-content/uploads/2010/07/picture-word-riddle.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Graphics & Design</h2>
          <p>Design,develop and create</p>
        </div><!-- /.col-lg-4 -->
        	<div class="col-lg-4">
          <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Others</h2>
          <p>There  are other exciting domains too</p>
        </div><!-- /.col-lg-4 -->
      	</div><!-- /.row -->
	</div>

	<div class="jumbotron">
       <div>
        <h1>Explore the market</h1>
       	</div>
		<!-- Shooping grid -->
		<div class="container">
			<div class="row">
				<div class="col-md-4">

					<div class="img-thumbnail" alt="service thumbnail">
			  			<img src="https://www.ringling.edu/sites/default/files/styles/adaptive/public/GD_word.png?itok=3Ol_Kk7Q" class="img-fluid" alt="service-img">
			  <div class="caption">
				<div class="row">
				  <div class="col-md-12">
					<h4>
						<?php
							require 'mongoConnect.php';
							$collec = $db->market;

							$fetch = $collec->findOne(array('key' => 1),array('service' => 1, '_id' =>1,'key' => 1, 'price' => 1));
							$key = $fetch["key"];
							
						print_r($fetch["service"]);
						?>
							</h4>
				  </div>
				  <div class="col-md-6">
					  <h3 style="margin:5px auto;">
					  <label>
					  	₹
					  	<?php
							print_r($fetch["price"]);
						?>
					  </label></h3>
				  </div>
				 <!--
				  <div class="col-md-6">
					<a href="orderService.php" class="btn btn-success btn-product">
					  <span>
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					  </span> Add to Cart
					</a>
				  </div>
				 -->


				  <div class="col-md-6">
				  <?php
					echo '<a href="viewService.php?id='.$fetch['_id'].'" id="view" name="view" class="btn btn-success btn-product">
					   View Details
					</a>';
					?>
				  </div>


				  <p> </p>              
				</div>            
			  </div>
			</div>        

		</div>

		<div class="col-md-4">

			<div class="img-thumbnail" alt="service thumbnail">
			  <img src="http://4.bp.blogspot.com/-f9g6ICUhSYg/TvRbHTxsmDI/AAAAAAAAADw/SC1T4TTVQyI/s1600/sdbdah.gif" class="img-fluid" alt="service-img">
			  <div class="caption">
				<div class="row">
				  <div class="col-md-12">
					<h4>
						<?php
							require 'mongoConnect.php';
							$collec = $db->market;

							$fetch = $collec->findOne(array('key' => 2),array('service' => 1, '_id' =>1,'key' => 1,'price' => 1));
							
							print_r($fetch["service"]);
						?>
							</h4>
				  </div>
				  <div class="col-md-6">
					  <h3 style="margin:5px auto;">
					  <label>
					  	₹
					  	<?php
							print_r($fetch["price"]);
						?>
					  </label></h3>
				  </div>
				 <!--
				  <div class="col-md-6">
					<a href="orderService.php" class="btn btn-success btn-product">
					  <span>
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					  </span> Add to Cart
					</a>
				  </div>
				 -->


				  <div class="col-md-6">
				 <?php
					echo '<a href="viewService.php?id='.$fetch['_id'].'" id="view" name="view" class="btn btn-success btn-product">
					   View Details
					</a>';
					?>
				 </div>


				  <p> </p>              
				</div>            
			  </div>
			</div>        

		</div>  

				<div class="col-md-4">

			<div class="img-thumbnail" alt="service thumbnail">
			  <img src="http://www.innovativeconsulting.co.in/wp-content/uploads/2016/01/web_design-e1455189184470.png" class="img-fluid" alt="service-img">
			  <div class="caption">
				<div class="row">
				  <div class="col-md-12">
					<h4>
						<?php
							require 'mongoConnect.php';
							$collec = $db->market;

							$fetch = $collec->findOne(array('key' => 3),array('service' => 1, '_id' =>1,'key' => 1,'price' => 1));
							
							print_r($fetch["service"]);
						?>
							</h4>
				  </div>
				  <div class="col-md-6">
					  <h3 style="margin:5px auto;">
					  <label>
					  	₹
					  	<?php
							print_r($fetch["price"]);
						?>
					  </label></h3>
				  </div>
				 <!--
				  <div class="col-md-6">
					<a href="orderService.php" class="btn btn-success btn-product">
					  <span>
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					  </span> Add to Cart
					</a>
				  </div>
				 -->


				  <div class="col-md-6">
				 <?php
					echo '<a href="viewService.php?id='.$fetch['_id'].'" id="view" name="view" class="btn btn-success btn-product">
					   View Details
					</a>';
					?>
				 </div>


				  <p> </p>              
				</div>            
			  </div>
			</div>        

		</div>  


		</div>
		
	  </div>
		</div>

		</div>

	

	<footer class="container-fluid text-center">
    <strong><p>Copyright &#169 2017 KingSkills </p></strong>
  </footer>




 	<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>