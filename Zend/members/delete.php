<!DOCTYPE HTML>
<html>
	<head>
		<title>NEKLS Member Directory</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>

		<div style='margin:0 0 .5em 0;'>
			<!-- when clicked, it will load the add user form -->
			<a href="/" class='customBtn'>
				Home
			</a>
			<a href="libread.php" class='customBtn'>
				View Libraries
			</a>

			<a href="create_lib_form.php" class='customBtn'>
				+ New Library
			</a>
			
			<!-- when clicked, it will show the user's list -->
			<a href="read.php" class='customBtn'>View Users</a>

	<!-- when clicked, it will load the add user form -->
	<a href="create_form.php" class='customBtn'>+ New User</a>
	
	
			
			
		<div style='clear:both;'></div>
		</div>

		<!-- this is wher the contents will be shown. -->
		<div id='pageContent'>
<?php
//include database connection
include 'libs/db_connect.php';

try {

	$query = "DELETE FROM " . $_REQUEST['db'] . " WHERE " . $_REQUEST['db']."ID = ". $_REQUEST['id'];
	$stmt = $con->prepare($query);
	
	if($stmt->execute()){
		echo "Entry was deleted.";
	}else{
		echo "Unable to delete entry.";
		echo $query;
	}
	
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
</body></html>