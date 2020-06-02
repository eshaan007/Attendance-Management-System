<!--All Attendance Is Shown Here-->
<?php
	include("header.php");                        
	require 'dbconfig/config.php';
?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add the Students</a>
			<a class="btn btn-info pull-right" href="ind.php">Back</a>
		</h2>
		
		<div class="panel panel-body">
			<table class="table table-striped">
				<tr>
					<th>S. No.</th>
					<th>Dates</th>
					<th>Show Attendance</th>
				</tr>
				<?php $result=mysqli_query($con,"select distinct date from record");           // Query written is for retrieving data for different dates-->
					$serialnumber=0;
					while($row=mysqli_fetch_array($result))
					{
					$serialnumber++;
				?>
				<tr>
					<td><?php echo $serialnumber; ?></td>
					<td><?php echo $row['date']; ?>
					</td>
					<td>
						<form action="show_attendance.php" method="POST">
							<input type="hidden" value="<?php echo $row['date'] ?>" name="date">
							<input type="submit" value="Show Attendance" class="btn btn-primary">
					</td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>