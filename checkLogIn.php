<?php
	session_start();
	function isloggedin()
  	{
		if (isset($_SESSION['email']))
	  		return true;
	  	else
	  		return false;
  	}
?>