<!--
	For updating students in The Database,
	First we need to check whether the attendance on particular date exists in the database.
-->

<?php
	require 'dbconfig/config.php';
?>

<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="container">
		<div class="well text-center">
			<h3>MAIN ADMIN PAGE</h3>
		</div>
	</div>
</head>

<body>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>
				<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
					<div class="btn-group mr-2" role="group" aria-label="First group">
						<a class="btn btn-success" href="register7.php">Add Teacher</a>
						<a class="btn btn-primary" href="register.php">Add Student</a>
						<a class="btn btn-warning" href="subject.php">Add Subject</a>
						<a class="btn btn-danger">Remove Subject</a>
						<a class="btn btn-primary" href="removeuser.php">Remove User</a>
						<a class="btn btn-success pull-right" href="homepage.php">Back</a>
					</div>
				</div>
			</h2>
		</div>
	</div>
</body>

</html>