<!-- Created by AkshayKeerti -->

<!DOCTYPE html>
<?php include('databaseConnect.php') ?>

<?php 
if(isset($_POST["submit"])){
	
	$sql = "update `tasks` set `taskName`='".$_POST['taskName']."',`taskStartDate`='".$_POST['taskSDate']."', `taskDueDate`='".$_POST['taskDDate']."', `taskPriority`='".$_POST['priority']."',`projectID`='".$_POST['ProjectId']."',`taskDone`='".$_POST['done']."' WHERE taskID = '".$_POST['taskID']."'";
	
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
<html>
 <head>
    <meta charset="UTF-8" />
    <title> Task Management Tool </title>
	<link rel="stylesheet" href="css/style2.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Condensed" rel="stylesheet">
 </head>
 <body>
 <div class = "wrapper">
<?php
	require('Header.php');
?>
<?php
	$sql = "SELECT taskName, taskStartDate, taskDueDate, taskPriority, taskDone, projectID FROM tasks WHERE taskID = '".$_GET['taskID']."'";
	$edit = $conn -> query($sql);
	$edit = $edit -> fetch_assoc();
?>	

<form action="" method="post">
	<input type="hidden" value="<?php echo $_GET['taskID'] ?>" name="taskID">
	<input type="text" value="<?php echo $edit['taskName'] ?>" required name="taskName" placeholder="Task Name here">
	<input type="date" value="<?php echo $edit['taskStartDate'] ?>" required name="taskSDate" placeholder="Task Date here">
	<input type="date" value="<?php echo $edit['taskDueDate'] ?>" required name="taskDDate" placeholder="Task Date here">
	<select required name="priority">
			<option value="">Select Priority</option>
			<option value ="high" <?php if($edit['taskPriority'] == 'High') { echo "selected";} ?>>High</option>
			<option value="medium" <?php if($edit['taskPriority'] == 'Medium') { echo "selected";} ?>>Medium</option>
			<option value="low" <?php if($edit['taskPriority'] == 'Low') { echo "selected";} ?>>Low</option>
	</select>
			<select required name="ProjectId"> 
			<option value=""> Select project </option>
			<?php
				$sql = "SELECT * FROM project";
				$result = $conn ->query($sql);
				while($row = $result ->fetch_assoc()){
					echo '<option ' ;
					if($row['projectID'] == $edit['projectID']) { echo "selected"; }
					echo ' value ="',$row['projectID'],'">',$row['projectName'],'</option>';
				}
			?>
	</select>
	<select name="done">
		<option value="yes" <?php if($edit['taskDone'] == 'yes') { echo "selected";} ?>>Yes</option>
		<option value="no" <?php if($edit['taskDone'] == 'no') { echo "selected";} ?>>No</option>
	</select>
	<input type="submit" name="submit">

</form>

<?php
	require('Footer.php');
?>	
</div>
</body>
</html>

 
 