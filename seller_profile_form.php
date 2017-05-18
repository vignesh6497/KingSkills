<html>
	<head>
		<meta charset="utf-8">
		<link href="css/seller_profile_form.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
	<body>
	 <?php 
	 require 'checkLogIn.php';              
  	  ?>

		<div class="container">
			<h1>Selling Information</h1>
			<hr>
			<div class="row">
			  <!-- left column -->
			  <div class="col-md-3">
				<div class="text-center">
				  <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
				  <h6>Upload a different photo...</h6>
				  
				  <input type="file" class="form-control">
				</div>
			  </div>
			  
			  <!-- edit form column -->
			  <div class="col-md-9 personal-info">
			<!--	<div class="alert alert-info alert-dismissable">
				  <a class="panel-close close" data-dismiss="alert">×</a> 
 						<i class="fa fa-coffee"></i>
				  This is an <strong>.alert</strong>. Use this to show important messages to the user. 
				</div>
				 <h3>Personal info</h3>
				-->
				<form action="" method="" class="form-horizontal" role="form">
				  <div class="form-group">
					<label class="col-lg-3 control-label">Email:</label>
					<div class="col-lg-8">

					  <input class="form-control" type="text" value= 
					  "<?php 
					  	echo $_SESSION['email'];
					  ?>"
							 disabled  >
					</div>
				  </div>
				  <!--

				  <div class="form-group">
					<label class="col-lg-3 control-label">First name:</label>
					<div class="col-lg-8">
					  <input class="form-control" type="text" value="Jane">
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-lg-3 control-label">Last name:</label>
					<div class="col-lg-8">
					  <input class="form-control" type="text" value="Bishop">
					</div>
				  </div>
				  -->
				  <div class="form-group">
					<label class="col-lg-3 control-label">Service:</label>
					<div class="col-lg-8">
					  <input class="form-control" type="text" value="">
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-lg-3 control-label">Price:</label>
					<div class="col-lg-8">
					  <input class="form-control" type="text" value="">
					</div>
				  </div>
				  
				 <div class="form-group">
					<label class="col-lg-3 control-label">Category:</label>
					<div class="col-lg-8">
					  <input class="form-control" type="text" value="">
					</div>
				  </div>

				  <div class="form-group">
					<label class="col-lg-3 control-label">Description:</label>
					<div class="col-lg-8">
					  <input class="form-control" type="text" value="">
					</div>
				  </div>
				  
				    
				  <div class="form-group">
					<label class="col-lg-3 control-label">Job Role:</label>
					<div class="col-lg-8">
						<div class="ui-select">
						<select id="job" name="user_job" class="form-control">
						  <optgroup label="Web">
							<option value="frontend_developer">Front-End Developer</option>
							<option value="php_developor">PHP Developer</option>
							<option value="python_developer">Python Developer</option>
							<option value="rails_developer"> Rails Developer</option>
							<option value="web_designer">Web Designer</option>
							<option value="WordPress_developer">WordPress Developer</option>
						  </optgroup>
						  <optgroup label="Mobile">
							<option value="Android_developer">Androild Developer</option>
							<option value="iOS_developer">iOS Developer</option>
							<option value="mobile_designer">Mobile Designer</option>
						  </optgroup>
						  <optgroup label="Business">
							<option value="business_owner">Business Owner</option>
							<option value="freelancer">Freelancer</option>
						  </optgroup>
						  <optgroup label="Graphic Designer">
						  	<option value="logo_design">Logo Design</option>
						  	<option value="t_shirt">T-shirt</option>
						  	<option value="poster">Flyer & Posters</option>
						  	<option value="banner_ads">Banner Ads</option>						  	
						  </optgroup>
						  <optgroup label="Other">
							<option value="secretary">Secretary</option>
							<option value="maintenance">Maintenance</option>
						  </optgroup>
						</select>
						</div>
					</div>
				  </div>
			<!--  <div class="form-group">
					<label class="col-lg-3 control-label">Time Zone:</label>
					<div class="col-lg-8">
					  <div class="ui-select">
						<select id="user_time_zone" class="form-control">
						  <option value="Hawaii">(GMT-10:00) Hawaii</option>
						  <option value="Alaska">(GMT-09:00) Alaska</option>
						  <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
						  <option value="Arizona">(GMT-07:00) Arizona</option>
						  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
						  <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
						  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
						  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
						</select>
					  </div>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="col-md-3 control-label">Username:</label>
					<div class="col-md-8">
					  <input class="form-control" type="text" value="janeuser">
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-md-3 control-label">Password:</label>
					<div class="col-md-8">
					  <input class="form-control" type="password" value="11111122333">
					</div>
				  </div>

				  -->		
				  <div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-8">
					  <input type="button" class="btn btn-primary" value="Save Changes">
					  <span></span>
					  <input type="reset" class="btn btn-default" value="Cancel">
					</div>
				  </div>
				</form>
			  </div>
		  </div>
		</div>
		<hr>
	</body>	

</html>