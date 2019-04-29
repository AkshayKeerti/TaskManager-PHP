<!-- Created by AkshayKeerti -->

<!DOCTYPE html>
<?php include('databaseConnect.php') ?>

<?php
if(isset($_GET['projectID'])){
	
	if(isset($_GET['done'])){
		$conn -> query("update project set done='yes' where projectID = '".$_GET['projectID']."'");
	}
	
	if(isset($_GET['delete'])){
		$conn -> query("delete from project where projectID = '".$_GET['projectID']."'");
	}
	
	header("location:Projects.php");exit();
	
}

?>

<html>
 <head>
    <meta charset="UTF-8" />
    <title> Task Management Tool </title>
	<link rel="stylesheet" href="css/style2.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Margarine|PT+Sans+Caption|Pacifico|Permanent+Marker" rel="stylesheet">
 </head>
 <body>
 <div class = "wrapper">
<?php
	require('HeaderForTask.php');
?>
<div class = "content">
<center> All projects 
<table height = "50" border = "1" class="projects">
<tr> <th>Project Name</th> <th>Project Priority</th> <th>Delete</th> <th>Edit</th>  </th></tr>
	<?php
		$sql = "SELECT * FROM project";
		$result = $conn ->query($sql);
		while($row = $result ->fetch_assoc())
		{
			echo "<tr><td>",$row['projectName'], '</td><td>', $row['projectPrio'], "</td>
			<td><a href='Projects.php?delete=1&projectID=",$row["projectID"],"'>&#10006</a></td>
			<td><a href='EditProject.php?edit=1&projectID=",$row["projectID"],"'>Edit</a></td>
			</tr>";
		}

?>
</table>
</center>
	
<br> 

<form action="newProject.php" method="POST">
	<input type="text" required name="projectName" placeholder="Project Name here">
	<select  required name="priority">
		<option value="">Select Priority</option>
		<option value="High">High</option>
		<option value="Medium">Medium</option>
		<option value="Low">Low</option>
	</select>
	<input type="submit" name="createProject">
		
</form>
</div>
<?php
	require('Footer.php');
?>	
</div>
</body>
</html>
	
 
 
