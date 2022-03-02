<?php

	$myinfo = $_POST['mytask'];
	$mytaskdate = $_POST['mydate'];
	$mytype = $_POST['mydetails'];
	

	$endpoint = "http://localhost/webdev/week00/lab11solution/api.php?newitem";

	$postdata = http_build_query(

		array(
			'addinfo' => $myinfo,
			'adddate' => $mytaskdate,
			'addtype' => $mytype
		)

	);

	$opts = array(

		'http' => array(
			'method' => 'POST',
			'header' => 'Content-Type: application/x-www-form-urlencoded',
			'content' => $postdata
		)

	);

	$context = stream_context_create($opts);
	$resource = file_get_contents($endpoint, false, $context);

	echo $resource;
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Things To Do</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="styles/mylist.css" >
</head>

<body>
	<div id="container">

		<div id="top">
			<div id="title">My ToDo List</div>
		</div>
		
		<div id="main">
			<article>
				
				<?php
					 if ($resource !== FALSE) {

						echo "<p>$myinfo</p>
						<p>$mytaskdate</p>
						<p>$mytype</p>";

						echo "<p>Thanks for adding the task.</p>
						<a href='display.php'>
						<div class='addright'>View My List</div>
						</a>";	
					 
					} else {

						 echo "Unable to add new task!";
					 }
				?>

			</article> 
		</div>
	</div>
</body>

</html>
