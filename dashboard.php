
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>KingSkills</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/dashboard.css">
	
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/cart.css">


    
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
		/* make sidebar nav vertical */ 
		@media (min-width: 768px) {
		  .sidebar-nav .navbar .navbar-collapse {
			padding: 0;
			max-height: none;
		  	}
		  .sidebar-nav .navbar ul {
			float: none;
		  	}
		  .sidebar-nav .navbar ul:not {
			display: block;
		  	}
		  .sidebar-nav .navbar li {
			float: none;
			display: block;
		  	}
		  .sidebar-nav .navbar li a {
			padding-top: 12px;
			padding-bottom: 12px;
			}
}

	</style>
</head>
<body>
  <?php require 'checkLogIn.php'; 	
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
                        <a class="nav-link" href="sellerIntro.php">Become a seller <span class="sr-only">(current)</span></a>
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
			          <a class="dropdown-item" href="seller_profile_form.php">Update Basic Info</a>
			          <a class="dropdown-item" href="#">Update Skills</a>
			          <a class="dropdown-item" href="#">Orders</a>
			        </div>
		      	</li>
		      		<li class="nav-item">
                    	<a class="nav-link" href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">0</span></a>
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
                            	    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                            	    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                            	    <input class="btn btn-default btn-login" type="submit" value="Login" name="commit" >
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
                                            <input id="username" name="username" class="form-control"  placeholder="Username" name="username" required>
                                            <input id="email" class="form-control" type="text" placeholder="Email" name="email" required>
                                            <input id="password" class="form-control" type="password" placeholder="Password" name="pass" required>
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
                          <a href="javascript: showLoginForm();">Login</a>  
                        </span>
                </div>                    
	         </div>
	    </div>
	  </div>
	</div>
	
	<!-- Trying out -->
	 <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Post Request <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Manage Request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="seller_profile_form.php">Start selling</a>
            </li>
            
          </ul>

         </nav>
        
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>Dashboard</h1>
          <!--
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <div class="text-muted">Something else</div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </section>
          -->
          <div>
            <h3>
              Notification  
            </h3>
            <?php
                require 'mongoConnect.php';

                $notifyCollection = $db->notification;
                $var = $notifyCollection ->find(array('sellerEmail' => $_SESSION['email']));

                foreach($var as $doc)
                {
            ?>
              <!--    $data=$doc['service'];
                  $data2=$doc['customerEmail'];
                  echo $data;
                echo $data2;
                }



                //var_dump($var);


                
              ?>-->
            <br>
            <div id ="notify">
            <div class="card">
              <div class="card-block">
                  <h4 class="card-title">Request to   
                    <?php
                      echo $doc['service'];
                    ?>
                  </h4>
                  <p class="card-text">
                  <strong>
                    <?php
                        echo "Order ID: ";
                    ?>
                  </strong>
                    <?php
                        echo $doc['_id'];
                    ?>
                    <br>
                    <?php
                        
                        echo "You have a service request of " ;
                        echo $doc['service'];
                        echo " from user ";
                    ?>
                    <strong>
                    <?php
                        echo $doc['customerEmail'];
                        echo ".";
                    ?>
                    </strong>
                    <br>
                    <?php
                        echo "Custom request: ";
                    ?>
                    <strong>
                    <?php
                        echo $doc['customRequest'];
                        echo ".";
                    ?>
                    </strong>
                    <br>
                    
                    <?php
                        echo "Message: " ;
                      ?> 
                      <strong>
                      <?php
                        echo $doc['message'];                      
                       ?>
                    </strong>
                   
                    
                    

                    <br>
                    <?php
                        echo "The order was status changed at ";
                        echo $doc['date'];
                        echo " ";
                        echo $doc['time'];
                        echo ".";
                    ?>
                  </p>

                  <?php
                      echo '<a href="acceptOrder.php?id='.$doc['orderID'].'&notify='.$doc['_id'].'" id="view" name="view" class="btn btn-success btn-product">
                        Accept
                            </a>';
                  ?>
                   <?php
                      echo '<a href="rejectOrder.php?id='.$doc['orderID'].'&notify='.$doc['_id'].'" id="view" name="view" class="btn btn-primary">
                        Reject
                            </a>';
                  ?>
                                
                  
              </div>
            </div>


          <?php

          }
          ?>


            </div>
          </div>

        </main>

      </div>
    </div>

    <div>
    	<h3>
    		Manage Order  
        </h3>
    	<div class="card">
              <div class="card-block">

              </div>
        </div>
    </div>



 	<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>