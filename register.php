<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel='stylesheet' href='css/style.css'>
</head>
<body style='background-color:#d8d8d8'>

	<div id='main-wrapper'>                                                                                                        
	 <center>
		<h2>Registration Form</h2>
		<img src='imgs/avatar.png' class='avatar'/>
	 </center>
	
	
	<form class='myform' action='register.php' method='post'>
	<br>
	<br>
	<br>
		<label><b>Firstname:</b></label>
			<input name='firstname' type='text' class='inputvalues' placeholder='Enter your firstname' required/> <br>                 
		<br>
		
		<label><b>Lastname:</b></label><br>
			<input name='lastname' type='text' class='inputvalues' placeholder='Enter your lastname' required/> <br>
		<br>
		
		<label><b>Profession:</b></label>
			<input name='profession' type='radio' class='radiobtns' value='teacher' checked required/> Teacher                       
        	<input name='profession' type='radio' class='radiobtns' value='student' checked required/> Student		
			<input name='profession' type='radio' class='radiobtns' value='admin' checked required/> Admin
		<br>
		<br>
		
		<label><b>UserName:</b></label><br>
			<input name='username' type='text' class='inputvalues' placeholder='Enter your username' required/> <br>
		<br>
		
		<label><b>ID:</b></label><br>
			<input name='id' type='text' class='inputvalues' placeholder='Enter your Id' required/> <br>
		<br>
		
		<label><b>Password:</b></label><br>
			<input name='password' type='password' class='inputvalues' placeholder='Create your password' required/> <br>
		<br>
		
		<label><b>Confirm Password:</b></label><br>
			<input name='cpassword' type='password' class='inputvalues' placeholder='Confirm your password' required/> <br>
		<br>
		<br>
			<input name='submit_btn' type='Submit' id='signup_btn' value='Sign Up'/>  		                                       
		<br>
			<a href='admin.php'><input type='button' id='back_btn' value='Back'/></a>
		
	</form>
	
	<?php
		if(isset($_POST['submit_btn']))
		{			
			$firstname = $_POST['firstname'];
			$lastname  = $_POST['lastname'];
			$profession= $_POST['profession'];
			$username  = $_POST['username'];
			$id        = $_POST['id'];
			$password  = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			if($password == $cpassword)
			{
				$encrypted_password = md5($password);
				
				$query= "select * from user WHERE firstname='$firstname'"; //Query to select FirstName
				$query_run = mysqli_query($con,$query);
				
				$query= "select * from user WHERE lastname='$lastname'"; //Query to select LastName
				$query_run = mysqli_query($con,$query);
				
				$query= "select * from user WHERE profession='$profession'";//Query to select Profession
				$query_run = mysqli_query($con,$query);
				
				$query= "select * from user WHERE username='$username'";//Query to select UserName
				$query_run = mysqli_query($con,$query);
				
				$query= "select * from user WHERE id='$id'";//Query to select UserID
				$query_run = mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					// If there already exists a user. 
					echo '<script type="text/javascript"> alert("User already exists...")</script>';
				}
				else
                {
					$query= "insert into user values('$firstname','$lastname','$profession','$username','$id','$encrypted_password')"; 
					$query_run = mysqli_query($con,$query);
					
					$_SESSION['message'] = "Record has been saved!";
			        $_SESSION['msg_type']= "Success";
					header('location:register.php');					
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("User Registered..Go to Login Page for Login")</script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!")</script>';
					}
				}		

				if(isset($_GET['delete'])){
					$id = $_GET['delete'];
					$mysqli->query("DELETE FROM user WHERE username='$username'") or die($mysqli->error());
				}
			}
		}
	?>
    </div>
</body>
</html>