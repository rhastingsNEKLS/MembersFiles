<?php require_once("header.php"); ?>
		<div id='pageContent'>
<?php
//include database connection
include 'libs/db_connect.php';

try{
	//write query
	$query = "INSERT INTO Personnel SET LastName = '" . $_POST['LastName'];
	$query = $query . "', FirstName = '". $_POST['FirstName'];
	$query = $query . "', LibraryName = " . $_POST['LibraryName'];
	$query = $query . "', Role - " . "
	$query = $query . ", HomeAddress1  = '" . $_POST['HomeAddress1'];
	$query = $query . "', HomeAddress2  = '" . $_POST['HomeAddress2'];
	$query = $query . "', HomeCity  = '". $_POST['HomeCity'];
	$query = $query . "', HomeState = '" . $_POST['HomeState'];
	$query = $query . "', HomeZip  = " . $_POST['HomeZip'];
	$query = $query . ", County  = " . $_POST['County'];
	$query = $query . ", HomePhone  = '" . $_POST['HomePhone'];
	$query = $query . "', EmailAddress  = '" . $_POST['EmailAddress'];
	$query = $query . "', AltContact  = '" . $_POST['AltContact'];
	$query = $query . "', SenateDistrict  = '" . $_POST['SenateDistrict'];
	$query = $query . "', HouseDistrict  = '" . $_POST['HouseDistrict'];
	$query = $query . "', Comment = '" . $_POST['Comment'];
	$query = $query . "', USD  =  " . $_POST['USD'] . ";";

	
	//prepare query for excecution
	$stmt = $con->prepare($query);

	
	// Execute the query
	if($stmt->execute()){
		echo "Personnel entry was created.<a href='create_form'>Create another?</a>";
		echo $query;
	}else{
		echo "Unable to create Personnel entry.";
		echo $query;	}
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
</div></body></html>