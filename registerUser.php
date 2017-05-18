<?php
	require 'mongoConnect.php';
	$collec1=$db->info;	
?>
<?php
	if(isset($_POST['commit']))
	{
		$usernm=$_POST['username'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$passc=$_POST['pass_c'];
		
		$array=array(
			"Username" => $usernm,
			"Email" => $email,
			"Password"=>$pass,		
		);
		
		$var = $collec1->insert($array);

		header('refresh:0.3,url=home.php');

		/*if($var)
		{
			
			?>
				<script type="text/javascript">
		//				alert("Succesfully Registered");
				</script>
			<?php
						
		}
		else
		{
				?>
				<script type="text/javascript">
		//				alert("Try again");
				</script>
			<?php
		}
		*/
	}
?>