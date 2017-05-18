<?php
	require 'mongoConnect.php';
	
	$collec = $db->market;
	$serviceId = $_GET['id'];
	$serviceIdObject = new MongoId($serviceId);
	$fetch = $collec->findOne(array('_id' => $serviceIdObject));

	//var_dump($fetch);		
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="../../favicon.ico">

    <title>
    	<?php
    		print_r($fetch['service']);
    	?>
    </title>
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="narrow-jumbotron.css" >
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
                          <a href="javascript: showLoginForm(); ">Login</a>  
                        </span>
                </div>                    
           </div>
      </div>
    </div>
  </div>

    <div class="container mt-5">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted"></h3>
      </div>

      <div class="jumbotron">
        <h1 class="display-3">
          <?php
            print_r($fetch['service']);
          ?>
        </h1>
        <p class="lead">
        	<?php
        		print_r($fetch['description'])
        	?>
        </p>
        <p class="lead"><strong>Price: ₹
          <?php
            print_r($fetch["price"]);
            ?>.</strong>
        </p>
        <p>
        <div class="row">
        <div class = "col-md-6">

        <?php 
            if(isloggedin())
            { 
        ?>
        <?php
          echo '<a href="orderService.php?id='.$fetch['_id'].'" id="view" name="view" class="btn btn-success btn-product">
            Place Order
            </a>';
          ?>
          </div>
          
          <div class = "col-md-6">
          <?php
          echo '<a href="test.php?id='.$fetch['_id'].'" id="cartButton" name="cartButton" class="btn btn-success btn-product"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</a>';
        
            }            
        ?>   
        </div>
        </div>
       	</p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Category</h4>
          <p><?php
                print_r($fetch['category']);
              ?>       
            </p>

          <h4>Time to deliver</h4>
          <p><?php
                print_r($fetch['delivery']);
              ?> days</p>

         <h4>Seller</h4>
          <p><?php
                print_r($fetch['userEmail']);
              ?></p>



        </div>

        <div class="col-lg-6">
         <h4>Total orders completed</h4>
          <p><?php
                print_r($fetch['totalOrder']);
              ?>                
          </p>
         <h4>Service Description specification</h4>
          <p><?php
                print_r($fetch['description']);
              ?> </p>

          
          
          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; Company 2017</p>
      </footer>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>