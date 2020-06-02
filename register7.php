<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration</title>
	<link rel='stylesheet' href='css/style.css'>
</head>

<body style='background-color:#d8d8d8'>

	<div id='main-wrapper'>
		<center>
			<h2>Registration Form</h2>
			<img src='imgs/teachim.png' class='teachim' />
		</center>

		<form class='myform' action='register7.php' method='post'>
			<br>
			<br>
			<br>
			<label><b>Username:</b></label><br>
				<input name='username' type='text' class='inputvalues' placeholder='Create username' required /> <br>
			<br>
			<label><b>Select Subject:</b></label> <br>
			<br>
				<input name='subject' type='radio' class='radiobtns' value='Web Technology' checked required /> 
				I.T. Theory
				<input name='subject' type='radio' class='radiobtns' value='Web Lab' checked required /> COA
				<input name='subject' type='radio' class='radiobtns' value='Blockchain Technology' checked required />
					Blockchain
			<br>
			<br>
			<br>
			<label><b>Profession:</b></label><br>
			<br>
				<input name='profession' type='radio' class='radiobtns' value='teacher' checked required /> Teacher
				<input name='profession' type='radio' class='radiobtns' value='student' checked required /> Student
				<input name='profession' type='radio' class='radiobtns' value='admin' checked required /> Admin
			<br>
			<br>
			<label><b>Id:</b></label><br>
				<input name='id' type='text' class='inputvalues' placeholder='Enter your Id' required /> <br>
			<br>
			<label><b>Password:</b></label><br>
				<input name='password' type='password' class='inputvalues' placeholder='Create your password' required />
			<br>
			<br>
			<label><b>Confirm Password:</b></label><br>
				<input name='cpassword' type='password' class='inputvalues' placeholder='Confirm your password' required />
			<br>
			<br>
			<br>
				<input name='submit_btn' type='Submit' id='signup_btn' value='Sign Up' />
			<br>
				<a href='admin.php'><input type='button' id='back_btn' value='Back' /></a>

		</form>

		<?php
		if(isset($_POST['submit_btn']))
		{
		
			$profession  = $_POST['profession'];
			$subject     = $_POST['subject'];
			$username  = $_POST['username'];
			$id        = $_POST['id'];
			$password  = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			if($password == $cpassword)
			{
				$encrypted_password = md5($password);
				
				$query= "select * from user7 WHERE lastname='$profession'";
				$query_run = mysqli_query($con,$query);
				
				$query= "select * from user7 WHERE subject='$subject'";
				$query_run = mysqli_query($con,$query);
				
				$query= "select * from user7 WHERE username='$username'";
				$query_run = mysqli_query($con,$query);
				
				$query= "select * from user7 WHERE id='$id'";
				$query_run = mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					echo '<script type="text/javascript"> alert("User already exists...")</script>';
				}
				else
                {
					$query= "insert into user7 values('$username','$subject','$profession','$id','$encrypted_password')"; 
					$query_run = mysqli_query($con,$query);
					
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("Teacher has been added...He can access Login Page")</script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!")</script>';
					}
				}					
			}	
		}
	?>
	</div>
</body>
</html>