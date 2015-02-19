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
				Libraries 
			SET
			LibraryName = '" . $_POST['LibraryName'] . "' ,
			Address1 = '" . $_POST['Address1'] . "' ,
			Address2 = '" . $_POST['Address2'] . "' ,
			City = '" . $_POST['City'] . "' ,
			State = '" . $_POST['State'] . "' ,
			Zip = '" . $_POST['Zip'] . "' ,
			Phone = '" . $_POST['Phone'] . "' ,
			Fax = '" . $_POST['Fax'] . "' ,
			County = " . $_POST['County'] . " ,
			Email = '" . $_POST['Email'] . "' ,
			Webpage = '" . $_POST['Webpage'] . "' ,
			Hours = '" . $_POST['Hours'] . "' ,
			GrantClass = " . $_POST['GrantClass'] . " ,
			USD = " . $_POST['USD'] . " ,
			Academic = " . $_POST['Academic'] . " ,
			Main = '" . $_POST['Main'] . "' ,
			Public = '" . $_POST['Public'] . "' ,
			Branch = '" . $_POST['Branch'] . "' ,
			School = '" . $_POST['School'] . "' ,
			Special = '" . $_POST['Special'] . "' ,
			Notes = '" . $_POST['Notes'] . "' 
			WHERE 
				LibrariesID = " . $_POST['LibrariesID'];
			
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