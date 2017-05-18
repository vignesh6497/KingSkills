<?php

require 'core.php';
require 'session.php';
				
					
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$product = $_POST['product'];
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	$tid = $_POST['tid'];
	$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);

	$cursor = $manager->executeQuery('eagro.makepayment', $query);

	$cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
    $arr=$cursor->toArray();	
    $cn=count($arr)+1;
    $bulk = new MongoDB\Driver\BulkWrite;
	$bulk1 = new MongoDB\Driver\BulkWrite;
	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

    $bulk->insert(['_id'=>$cn,'Customer_name' =>$name, 'Product_name' =>$product, 'E-mail' =>$email,'Contact'=>$mob,'Transaction_id'=>$tid]);

    $result=$manager->executeBulkWrite('eagro.makepayment', $bulk);

	if($result==True)
			{
				echo '<script language="javascript">';
				echo 'alert("Entry Stored Successfully...!!");';
				echo 'window.location.assign("index.php")';
				echo '</script>';
			}
		else
			{
				echo '<script language="javascript">';
				echo 'alert("Failed to store data....!!")';
				echo '</script>';
			}
	
	
	} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

</head>
<body style="background-color:aqua">
<?php
if(loggedin())
{
?>	
<div class="container">
  <h2><center>Payment</center></h2>
  <form method="post" action="#">
    	<div class="form-group">
			<label class="sr-only">Full Name</label>
		   	<input type="text" name="name" placeholder="Fullname"  required class="form-control" id="contact-name">
		</div>
        <div class="form-group">
		   	<label class="sr-only" for="contact-clg">Product Name</label>
		   	<input type="text" name="product" placeholder="Product name" required class="form-control" id="contact-clg">
		</div>
                                  
        <div class="form-group">
			<label class="sr-only" for="contact-email">Email</label>
			<input type="email" name="email" placeholder="Email" required  class="contact-email form-control" id="contact-mail">
		</div>
   
		<div class="form-group">
			 <label class="sr-only" >Mobile No:</label>
			 <input type="text" maxlength="10" minlength="10" name="mob"  placeholder="Mobile No:" required class="form-control" id="mob">
		</div>
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal">Make Payment</button>&nbsp;&nbsp;Click here to make payment through Paytm..!!<br>

    			<div class="form-group">
			 <label class="sr-only" >Transaction id</label>
			 <input type="text" maxlength="15" name="tid"  placeholder="Transaction id" required class="form-control" id="tid">
		</div>

		<center><input type="submit" value="submit" class="btn btn-info btn-sm" name="submit"></center>
    </form>
  
  
  

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
				<img src ="images/qr.jpg"  alt="paytm" /> 
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
</body>
</html>
