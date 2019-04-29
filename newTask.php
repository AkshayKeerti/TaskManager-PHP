<!-- Created by AkshayKeerti -->

<?php include('databaseConnect.php') ?>

<?php 
	if(isset($_POST['newTask'])){
		$sql = "INSERT into tasks (taskName, taskStartDate, taskDueDate, notes, taskPriority, projectID) VALUES ('".$_POST['taskName']."','".$_POST['taskSDate']."', '".$_POST['taskDDate']."' , '".$_POST['taskNotes']."', '".$_POST['priority']."','".$_POST['ProjectId']."')";
		if ($conn->query($sql) == TRUE) 
		{
			echo "New record created successfully";
		} 
		
		else 
		{
			echo "Error creating record: " . $conn->error;
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		header("location:Task.php");
		exit();
	}
 ?>
 
 