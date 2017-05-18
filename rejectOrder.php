<?php
	require 'mongoConnect.php';
	require 'checkLogIn.php';

	$orderId = $_GET['id'];
	$orderIdObject = new MongoId($orderId);
	$notifyId = $_GET['notify'];
	$notifyIdObject = new MongoId($notifyId);

	$status = array("Placed","Accepted","Rejected","Prototype shown" ,"Revisions Made","Completed");
	

	$collection = $db->order;
	$fetch = $collection->findOne(array("_id" => $orderIdObject));	
	var_dump($fetch);
	$customer = $fetch["customerEmail"];

	date_default_timezone_set("Asia/Kolkata");
	$date = date("d/m/Y");
	$time =date("h:i:sa");
	
	
	$array=array(
			
			"date" => $date,
			"time" => $time,
			"status" => $status[2]
			
		);

	$collection->findAndModify(array("_id" => $orderIdObject), array('$set'=>$array));
	

	$collection = $db->notification;

	$collection->remove(array("_id"=>$notifyIdObject));
	

	
	
	
	$arrayNotify = array("service" =>null,"sellerEmail"=>$customer, "date"=>$date, "time" => $time, "status" => $status[2], "message" => "Your order request has been rejcted by the service provider.","customerEmail" => null, "orderID" => null, "customRequest" => null);
	
	$var1 = $collection->insert($arrayNotify);
	

   	header('refresh:0.3,url=dashboard.php');
?>