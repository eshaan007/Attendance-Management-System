<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<?php require_once 'register.php'; ?>

	<?php
		if(isset($_SESSION['message'])): 
	?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">

		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>

		<div class="container">
		
		<?php
			$mysqli = new mysqli('localhost','root','','newdb') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM user") or die($mysqli->error);	
			require 'dbconfig/config.php';
		?>

			<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>username</th>
							<th>Id</th>
							<th colspan="2">Action</th>
						</tr>

					</thead>

					<?php
						while ($row = $result->fetch_assoc()):
					?>

					<tr>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['Id']; ?></td>
						<td>
							<a href="register.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
							<a href="register.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					
					<?php endwhile; ?>
				</table>
			</div>
		</div>

		<?php
			function pre_r($array){
				echo '<pre>';
				print_r($array);
				echo '</pre>';		
			}
		?>
	</div>
</body>
</html>