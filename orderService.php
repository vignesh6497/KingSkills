<?php
	require 'checkLogIn.php';
	if(!isloggedin())
	{
		?>
		<script type="text/javascript">
			alert("Please log-in to to hire a service");
		</script>
		<?php
		header('refresh:0.3,url=home.php');
	}
	
	require 'mongoConnect.php';
	$collection = $db->market;	
	$serviceId = $_GET['id'];
	$serviceIdObject = new MongoId($serviceId);
	$fetch = $collection->findOne(array('_id' => $serviceIdObject));
	//var_dump($fetch);

	$collection = $db->order;
	

	date_default_timezone_set("Asia/Kolkata");
	$date = date("d/m/Y");
	$time =date("h:i:sa");
	$status = array("Viewed","Placed","Accepted","Rejected","Prototype shown" ,"Revisions Made","Completed");

	$array=array(
			"sellerEmail" => $fetch['userEmail'],
			"customerEmail" => $_SESSION['email'],
			"price" => $fetch['price'],
			"serviceID" => $fetch['_id'],
			"category" => $fetch['category'],
			"daysReq" => $fetch['delivery'],
			"date" => $date,
			"time" => $time,
			"status" => $status[0]
		);


	//$var = $collection->insert($array);
	$msgSender = "Your request for service order of "+$fetch['service']+" has been placed and mail has also been sent to the seller. We will keep you updated regarding the status of your order.
		Thank you,
		KingSkills Team.";
	$msgSender = wordwrap($msgSender, 70);
	//mail("vikyaiyer1997@gmail.com","Order Placed - KingSkills",$msgSender);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<script>
		function myFunction() {
    		document.getElementById("orderSummary").style.display = "none";
    		document.getElementById("payment").style.display = "block";
		}

		function myFunction1() {
    		document.getElementById("payment").style.display = "none";
			document.getElementById("orderSummary").style.display = "block";


		}

		$(document).ready(function () {
    		$("#preview").toggle(function() {
       		$("#payment").hide();
        	$("#orderSummary").show();
    	}, function() {
        	$("#payment").show();
        	$("#orderSummary").hide();
    	});
});
		


</script>
</head>
<body>
	<script type="text/javascript">
			document.getElementById("payment").style.display = "none";			
	</script>

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

	<div class="container mt-5">

	<div class="card text-center">
  		<div class="card-header">
    	<ul class="nav nav-pills card-header-pills">
     		 <li class="nav-item">
        <a class="nav-link" onclick="myFunction1()" href="#">Order Summary</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick ="myFunction()" href="#" > Payment</a>
      </li>
      
    </ul>
  </div>
  <div class="card-block" id="orderSummary">
    <h4 class="card-title">Customize your order summary</h4>
    <p class="card-text">
   		 	
   		 		<ul style="list-style: none; text-align: center; display: inline;">
   		 		<li>
   		 			Service ID :  <?php print_r($fetch['_id']) ?>
   		 		</li>
		    	<li>
		    		Service :<?php print_r($fetch['service']) ?> 
		    	</li>
		    	<li>
		    		Service provider e-mail :  <?php print_r($fetch['userEmail']) ?> 
		    	</li>
		    	<li>
		    		Price : ₹<?php print_r($fetch['price'])  ?> 
		    	</li>
		    	<li>
		    		Category : <?php print_r($fetch['category']) ?> 

		    	</li>
		    	<li>

		    		Order delivered by : <?php print_r($fetch['delivery'])  ?> days 		    	
		    	</li>
		    	
		    	<li>
		    		Status :<?php print_r($status[0]); ?> </li>
		    	</li>
		<form action="summarySubmit.php" method="POST">
		    	<input type="hidden" value="<?php echo $fetch['_id']; ?>" name="serviceID">
		    	<li>
		    		Custom Request :<br> 
		    			
		    		<textarea rows="4" cols="50"  name= "customRequest"></textarea>
		    			


		    		 
		    	</li>

		    		
		    	
		  
    		</ul>
	
   		
    		
   		
    </p>
   
  	
	</div>


	<div class="card-block" id="payment">
    	<h4 class="card-title">Payment Options</h4>
    	<p class="card-text">

    		 <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>

                <div class="panel-body">
                  
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-product" name="submit">Proceed for payment</button>
                        
           		
				
   		 		</div>

   		 		</div>

   		</p>

   	</div>
   	<?php
if(isloggedin())
{
?>	
<div class="container">
  <h2><center>Payment</center></h2>
 		<button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal">Make Payment</button>&nbsp;&nbsp;Click here to make payment through Paytm..!!<br>

  
  
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">QR Code</h4>
		</div>
        <div class="modal-body">
          <p>Scan this code.</p>
		   <div class="row">
			<center>
				<img src ="img /paytm.jpg"  alt="paytm" /> 
			</center>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<?php
}else
{
				echo '<script language="javascript">';
				echo 'alert("Sorry...Login Here...!!");';
				echo 'window.location.assign("login.php")';
				echo '</script>';
}
	
?>


   	</form></body></html>
    	
   