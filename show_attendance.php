<?php
	require 'dbconfig/config.php';
	include("header.php");                                                            
?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>
			<a class="btn btn-success" href="web.php">I.T. Theory</a>
			<a class="btn btn-primary" href="lab.php">COA</a>
			<a class="btn btn-info" href="blockchain.php">Blockchain</a>
			<a class="btn btn-info pull-right" href="ind.php">Back</a>
		</h2>

		<div class="panel panel-body">
			<form action="ind.php" method="post">
				<table class="table table-striped">
					<tr>
						<th>ID</th>
						<th>UserName</th>
						<th>Attendance Status</th>
					</tr>

					<?php $result=mysqli_query($con,"SELECT * FROM record WHERE date='$_POST[date]'"); 
						$counter=0;
						while($row=mysqli_fetch_array($result))
						{					
					?>

					<tr>

						<td><?php echo $row['username']; ?>

						</td>
						<td><?php echo $row['id']; ?>

						</td>
						<td>
							<input type="radio" name="attendance_status[<?php echo $counter; ?>]"
								<?php if($row['attendance_status']=="Present") echo "checked=checked"; ?>
								value="Present">Present

							<input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Absent" <?php if($row['attendance_status']=="Absent")echo "checked=checked";?>
							>Absent
						</td>
					</tr>

					<?php
						$counter++;
					}
					?>
				</table>
				<input type="submit" name="submit" value="submit" class="btn btn-primary">
		</div>
	</div>
</div>