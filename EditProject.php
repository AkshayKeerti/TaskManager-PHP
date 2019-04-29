<!-- Created by AkshayKeerti -->

<!DOCTYPE html>
<?php include('databaseConnect.php') ?>

<?php 
if(isset($_POST['submit'])){
	
	$sql = "UPDATE `project` SET `projectName`='".$_POST['projectName']."',`projectPrio`= '".$_POST['priority']."' WHERE projectID = '".$_POST['projectID']."'";
	
	if ($conn->query($sql) == TRUE) 
	{
		echo "New record created successfully";	
	} 
	else 
	{
		echo "Error creating record: " . $conn->error;
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	header("location:Projects.php");
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
	//fetch all the details for this proj id
	$sql = "SELECT projectName, projectID, projectPrio FROM project WHERE projectID = '".$_GET['projectID']."'";
	$edit = $conn -> query($sql);
	$edit = $edit -> fetch_assoc();
?>		

<form action="" method="POST">
	<input type="hidden" value="<?php echo $_GET['projectID'] ?>" name="projectID">
	<input type="text" value="<?php echo $edit['projectName'] ?>" required name="projectName" placeholder="Project Name here">
	<select required name="priority">
			<option value="">Select Priority</option>
			<option value ="high" <?php if($edit['projectPrio'] == 'High') { echo "selected";} ?>>High</option>
			<option value="medium" <?php if($edit['projectPrio'] == 'Medium') { echo "selected";} ?>>Medium</option>
			<option value="low" <?php if($edit['projectPrio'] == 'Low') { echo "selected";} ?>>Low</option>
	</select>
		
	<input type="submit" name="submit">
		
</form>
	
	