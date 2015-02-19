<!DOCTYPE HTML>
<html>
	<head>
		<title>NEKLS Member Directory</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
			<div id='pageContent'>
<?php
try {
	include 'libs/db_connect.php';
	
	//prepare query
	$query = "UPDATE 
				Personnel 
			SET
			LastName = '".$_POST['LastName'] . "' ,
			FirstName = '".$_POST['FirstName'] . "' ,
			LibraryName = '".$_POST['LibraryName'] . "' ,
			HomeAddress1 = '".$_POST['HomeAddress1'] . "' ,
			HomeAddress2 = '".$_POST['HomeAddress2'] . "' ,
			HomeCity = '".$_POST['HomeCity'] . "' ,
			HomeState = '".$_POST['HomeState'] . "' ,
			HomeZip = '".$_POST['HomeZip'] . "' ,
			County = '".$_POST['County'] . "' ,
			HomePhone = '".$_POST['HomePhone'] . "' ,
			EmailAddress = '".$_POST['EmailAddress'] . "' ,
			AltContact = '".$_POST['AltContact'] . "' ,
			SenateDistrict = '".$_POST['SenateDistrict'] . "' ,
			HouseDistrict = '".$_POST['HouseDistrict'] . "' ,
			Comment = '".$_POST['Comment'] . "' ,
			USD = '".$_POST['USD'] . "'
			WHERE 
				PersonnelID = " . $_POST['PersonnelID'];
			
	$stmt = $con->prepare( $query );
	
	//execute our query
	if($stmt->execute()){
		?>
		<h2>Success!</h2>
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
		</div> <?php 
		}else{
		echo "Unable to read record.";
		echo $query;
	}
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
</body></html>