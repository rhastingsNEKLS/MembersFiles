<!DOCTYPE HTML>
<html>
	<head>
		<title>NEKLS Member Directory</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
<a href="/" class='customBtn'>
				Home
			</a>
		<!-- this is wher the contents will be shown. -->
		<div id='pageContent'>
<?php
//include database connection
include 'libs/db_connect.php';
error_reporting("ALL");

try{
	//write query
	$query = "INSERT INTO Libraries SET LibrariesID = '', LibraryName = '";
	$query = $query . $_POST['LibraryName'] . "', Address1  = '";
	$query = $query . $_POST['Address1'] ."', Address2  = '";
	$query = $query . $_POST['Address2'] . "', City  = '";
	$query = $query . $_POST['City'] . "', State  = '";
	$query = $query . $_POST['State'] . "', Zip  = '";
	$query = $query . $_POST['Zip'] . "', County  = '";
	$query = $query . $_POST['County']. "', Phone  = '";
	$query = $query . $_POST['Phone'] . "', Fax = '";
	$query = $query . $_POST['Fax'] . "', Email  = '";
	$query = $query . $_POST['Email'] . "', Webpage  = '";
	$query = $query . $_POST['Webpage'] . "', Hours  = '";
	$query = $query . $_POST['Hours'] . "', GrantClass  = ";
	$query = $query . $_POST['GrantClass'] . ", Academic = '";
	$query = $query . $_POST['Academic'] . "', USD  = ";
	$query = $query . $_POST['USD'] . ", Main = '";
	$query = $query . $_POST['Main'] . "', Public = '";
	$query = $query . $_POST['Public'] . "' , Branch = '";
	$query = $query . $_POST['Branch'] ."', School = '";
	$query = $query . $_POST['School'] . "', Special = '";
	$query = $query . $_POST['Special'] . "', Notes = '";
	$query = $query . $_POST['Notes'] . "';";
	
	//prepare query for excecution
	$stmt = $con->prepare($query);

	
	// Execute the query
	if($stmt->execute()){
		echo "Library entry was created. <a href='create_lib_form.php'>Create another one?</a>";
	}else{
		echo "Unable to create Library entry.";
	}
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
</div>
</body>
</html>
