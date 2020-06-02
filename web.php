<?php
require 'dbconfig/config.php';
include("header.php");
$flag=0;
$update=0;
$username='';
$id='';
    if(isset($_POST['submit']))                                                                
    {
		$date = date("Y-m-d");
		
		$records= mysqli_query($con,"select * from record where date='$date'");;
		$num=mysqli_num_rows($records);
		
		if($num)                                                                             
		{
			foreach($_POST['attendance_status'] as $id=>$attendance_status)
			{
			$username     = $_POST['username'][$id];
			$id           = $_POST['id'][$id];
			
			$result=mysqli_query($con, "update record set username='$username',id='$id',attendance_status='$attendance_status',date='$date'
			where date='$date';
			
			");
			if($result)
			{
				$update=1;
			}
			}
		}
		else
		{
		 foreach($_POST['attendance_status'] as $id=>$attendance_status)
		{
			$username = $_POST['username'][$id];
			$id       = $_POST['id'][$id];
			
			$result=mysqli_query($con,"insert into record(username,id,attendance_status,date)values('$username','$id','$attendance_status','$date')");
			if($result)
			{
				$flag=1;
			}
		}
		}		
	}                                                                       
?>

<title>I.T. Theory</title>
<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>

			<a class="btn btn-success" href="viewall.php">View All</a>
			<a class="btn btn-info pull-right" href="ind.php">Back</a>
		</h2>
		<?php if($flag){ ?>
		<div class="alert alert-success">
			Attendance Data Inserted Successfully
		</div>
		<?php } ?>

		<?php if($update){ ?>
		<div class="alert alert-success">
			Attendance Data Updated Successfully
		</div>
		<?php } ?>

		<h3>
			<div class="well text-center">Date:<?php echo date("Y-m-d"); ?> </div>
		</h3>
		<div class="panel panel-body">
			<form action="ind.php" method="post">
				<table class="table table-striped">
					<tr>
						<th>ID</th>
						<th>UserName</th>
						<th>Attendance Status</th>
					</tr>

					<?php $result=mysqli_query($con,"select * from user"); 
						$counter=0;
						while($row=mysqli_fetch_array($result))
						{
					?>

					<tr>
						<td><?php echo $row['username']; ?>
							<input type="hidden" value="<?php echo $row['username']; ?>" name="username[]">
						</td>
						<td><?php echo $row['Id']; ?>
							<input type="hidden" value="<?php echo $row['Id']; ?>" name="id[]">
						</td>
						<td>


							<input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Present" <?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Present") {
		echo "checked=checked";
	}
	?> required>Present
							<input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Absent" <?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Absent") {
		echo "checked=checked";
	}
    ?> required>Absent
						</td>
					</tr>


					<?php $counter++;
						}
					?>

				</table>

				<input type="submit" name="submit" value="submit" class="btn btn-primary">
		</div>
	</div>