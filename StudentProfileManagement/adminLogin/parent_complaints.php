<?php
	session_start();
	require 'dbconfig/pconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Academic Profile Management System</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color:#f8c291">
	<div id="main-wrapper">
		<img src="imgs/students.jpg" class="studpic"/>
		<center><h1>STUDENT PROFILE MANAGEMENT SYSTEM</h1></center>
		
	</div>
	
	<div id="admin-button-wrapper">
		<form class="ad_btns" action="parent_tf.php" method="post">
			<a href="parent_viewnotices.php"><input type="button" id="add_teacher" value="View Notices/Events"/></a>
			<a href="parent_complaints.php"><input type="button" id="add_course" value="View Complaints"/></a>
			<a href="parent_suggestions.php"><input type="button" id="add_course" value="Give Suggestions"/></a>
			<div class="details" action="parent_complaints.php">
			<button class="details-btns">Give Feedback</button>
			<div class="details-content" >
			<a href="parent_sf.php">About Student</a><br>
			<a href="parent_tf.php">About Teacher</a>
			</div>
			</div>
			<div class="reports" action="parent_complaints.php">
			<button class="report-btns">View Student Report</button>
			<div class="report-content" >
			<a href="parent_atr.php">Attendance Report</a><br>
			<a href="parent_gr.php">Grades Report</a>
			</div>
			</div>
			<a href="index.php"><input type="button" id="add_teacher" value="Log Out"/></a>
		</form>
	</div>
	
	<div id="add_t">
		<center><label style="color:#586ebc;font-size:24px;"><br><br><b><u>Complaints</b></u></label><br></center>
				<label><label><br>
				
				
				<?php
					
					$query="SELECT * FROM complaints WHERE id='{$_SESSION['id']}'";
					$query_run=mysqli_query($con,$query);
					
				if(mysqli_num_rows($query_run)>0)
				{
					
					
					echo '
					<label style="font-size:20px;color:red;">We have the following complaints about your child </label><br><br>
					<table>
					<thead>
					<tr>
					<th style="background-color:#7f8c8d;color:black;width:170px;height:30px;"><b>STUDENT NAME</b></th>
					<th style="background-color:#7f8c8d;color:black;width:590px;height:30px;"><b>COMPLAINT</b></th>
					</tr>
					</thead>
					<tbody>
					';
					
					while($query_executed=mysqli_fetch_assoc($query_run))
						{
							echo '<tr>
							<td style="background-color:#d35400;color:white;width:170px;height:30px;">'.$query_executed['student_name'].'</td>
							<td style="background-color:#d35400;color:white;width:590px;height:30px;">'.$query_executed['complaint'].'</td>
							</tr>
							';
						}
						
						echo '
						</tbody>
						</table>
						
						<br>
						<br>
						<br>';
						
		
				}
				
				else
				{
					echo '<label style="font-size:24px;color:#fd9644;">We don\'t have any complaint for your child </label>';
				}
						
					
					?>
				
				
		
	</div>	
	
	<div id="footer">
	</div>
</body>
</html>
