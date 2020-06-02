<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>Home Page</title>
<link rel='stylesheet' href='css/style.css'>
</head>
<body style='background-color:#d8d8d8'>

	<div id='main-wrapper'>                                                                        
	 <center>
		<h2>Home Page</h2>
		<h3>Welcome! <?php echo $_SESSION["id"]?> </h3>		
		<img src='imgs/avatar.png' class='avatar'/>
	 </center>
	
	<form class='myform' action='homepage.php' method='post'>
	<br>
	<br>
	<br>
	
	<input name='Click' type='Submit' id='click_btn' value='Click to Proceed'/>
	<input name='logout' type='Submit' id='logout_btn' value='Log Out'/>	                                
		
	</form>
	<?php
	    if(isset($_POST['logout']))
		{
		   session_destroy();
		   header('location:index.php');
		}
		else
		{
			if(isset($_POST['Click']))
			header('location:admin.php');
		}
		
	?>
    </div>

</body>
</html>