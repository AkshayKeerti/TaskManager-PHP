<!-- Created by AkshayKeerti -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Task Management Tool</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Margarine|PT+Sans+Caption|Pacifico|Permanent+Marker" rel="stylesheet">
</html>
 </head>
 <body>
 <div class = "wrapper">
<?php
	require('Header.php');
?>
	<div class = "content">
	<p class = "text">
		Welcome to Task management tool. This tool will help you to keep track <br>
		<br>
		of your projects and make sure you submit them on time. To create a new project press <br>
		<br>
		the create button below!<br>
	</p>
	<div class = "nav">
	<a href = "Task.php">Task</a>
	<a href ="Projects.php">Projects</a>
	</div>
	<?php
	?>
	</div>
<?php
	require('Footer.php');
?>	
</div>
</body>
</html>

