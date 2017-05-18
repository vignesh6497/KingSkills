<?php
	require 'mongoConnect.php';
	session_start();
	$collec1=$db->info;
	
	
	if(isset($_POST['commit']))
	{
		$email=$_POST['email'];
		$pass=$_POST['password'];
		
		$check = $collec1->findOne(array("Email"=> $email));
		if(empty($check))
		{
			echo "Not found";
		}
		else
		{
		
			$doc_pass = $check['Password'];
			
			if($pass==$doc_pass)
			{
				$_SESSION['email']=$email;
				?>
				<script>
					alert("Hi, You have successfully logged in!");

				</script>
				<?php
				header('refresh:0.3,url=home.php');
				

			}

		}

	}
?>
		
