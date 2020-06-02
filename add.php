<?php
	include("header.php");       
	require 'dbconfig/config.php';
	$flag=0;
	
	if(isset($_POST['submit']))
	{
		$result=mysqli_query($con,"insert into attend(student_name,roll_number)values('$_POST[name]','$_POST[roll]')");
		if($result)
		{
			$flag=1;
		}
	}
?>

<!--
	2 Buttons Created: 
		1. Add New Student
		2. Go Back 
-->
<html>

	<head>
		<title>Update</title>
	</head>

	<body>
		<div class="panel panel-default">
			
			<?php if($flag){ ?>
				<div class="alert alert-success">
					<strong>!success</strong> Attendance of Students Successfully Updated;
				</div>
			<?php } ?>

			<div class="panel-heading">
				<h2>
					<a class="btn btn-success" href="add.php">Add New Student</a>
					<a class="btn btn-info pull-right" href="index.php">Go Back</a>
				</h2>
			</div>

			<div class="panel-body">
				<form action="add.php" method="post">
					<div class="form-group">
						<label for="name">Name of Student</label>
						<input type="text" name="name" id="name" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="roll">Roll Number</label>
						<input type="text" name="roll" id="roll" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="submit" name="submit" value="submit" class="btn btn-primary" required>
					</div>
				</form>
			</div>
		</div>
	</body>

</html>