<?php
	require 'mongoConnect.php';
	require 'checkLogIn.php';
?>
<?php
	$collection = $db->order;
	echo "asasa";
	date_default_timezone_set("Asia/Kolkata");
	$date = date("d/m/Y");
	$time =date("h:i:sa");
	
	$status = array("Placed","Accepted","Rejected","Prototype shown" ,"Revisions Made","Completed");

		if (isset($_POST['submit'])){
			$serviceID = $_POST['serviceID'];		
			$cusReq = $_POST['customRequest'];
			$cardNumber =$_POST['cardNumber'];
			$cardExpiry =$_POST['cardExpiry'];
			$cardCVC = $_POST['cardCVC'];
		
		
		$array=array(	
				"customerEmail" => $_SESSION['email'],
				"serviceID" => $serviceID,
				"date" => $date,
				"time" => $time,
				"status" => $status[0],
				"customRequest" => $cusReq,
				"cardNumber" => $cardNumber,
				"cardExpiry" => $cardExpiry,

		);

		$var = $collection->insert($array);
	}

	$fetch = $collection->findOne(array('serviceID' =>$serviceID ,'customerEmail' => $_SESSION['email'] ));
	var_dump($fetch);
	$collection = $db->market;

	$serviceIdObject = new MongoId($serviceID);
	
	$fetchMarket = $collection->findOne(array('_id'=>$serviceIdObject));
	var_dump($fetchMarket);

	

	$arrayNotify = array("service" =>$fetchMarket['service'], "sellerEmail" => $fetchMarket['userEmail'],"customerEmail" => $_SESSION['email'],"orderID" => $fetch['_id'],"date"=>$date, "time" => $time, "status" => $status[0], "customRequest" => $fetch['customRequest'],"message" => NULL);
	$notifyCollection = $db->notification;
	$var1 = $notifyCollection->insert($arrayNotify);

?>
<?php
	header('refresh:0.3,url=home.php');
?>