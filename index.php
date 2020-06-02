<?php
	session_start();                            
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<link rel='stylesheet' href='css/style.css'>
</head>

<body style='background-color:#d8d8d8'>

	<div id='main-wrapper'>
		<center>
			<h2>Login Form</h2>
			<img src='imgs/avatar.png' class='avatar' />
		</center>

		<form class='myform' action='index.php' method='post'>
			<br>
			<br>
			<br>
		
			<label>
				<b>
					ID:
				</b>
			</label>
			
			<input name='id' type='text' class='inputvalues' placeholder='Type your Id' /><br>
			
			<br>
			
			<label>
				<b>
					Password:
				</b>
			</label>
			
			<input name='password' type='password' class='inputvalues' placeholder='Type your password' /><br>
			
			<br>
			<br>
						
			<!--Input Submitted to Server-->
			<input name='login' type='Submit' id='login_btn' value='Login' /> 
			<a href='register.php'><input type='button' id='register_btn' value='Register' /></a>
		</form>

		<?php
	if(isset($_POST['login']))                                                                                 
	{
		$id       = $_POST['id'];
		$password = $_POST['password'];
		$encrypted_password = md5($password);
		$query = "select * from user WHERE id='$id' AND password='$encrypted_password'";		            
        $query_run = mysqli_query($con,$query);
	    if(mysqli_num_rows($query_run)>0)                                                                      
	    {
			$_SESSION["id"] = $id;                                                    
	        header('location:homepage.php');                                                         
		}
		else
		{
			//Login Invalid
			echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
		}
	}
	?>
	</div>

</body>

</html>