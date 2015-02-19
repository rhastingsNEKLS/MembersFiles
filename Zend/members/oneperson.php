<!DOCTYPE HTML>
<html>
	<head>
		<title>NEKLS Member Directory</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>

		<div style='margin:0 0 .5em 0;'>
			<!-- when clicked, it will load the add user form -->
			<a href="/" class='customBtn'>Home Screen</a>
		</div>
			
<?php
//include database connection
include 'libs/db_connect.php';

try{
	//write query
	$query = "SELECT * FROM Personnel WHERE PersonnelID = '" . $_REQUEST['perlook'] . "';";
	$stmt = $con->prepare($query);

	
	// Execute the query
	if($stmt->execute()){
		echo "<table border='0' width='60%' id='tableview'>";
		 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
            
            //creating new table row per record
            echo "<tr>";
            echo "<td>Personnel ID:</td><td> {$PersonnelID}</td></tr>";
			echo "<tr><td>Name:</td><td> {$FirstName} ${LastName} </td></tr>";
			echo "<tr><td>Library Name:</td>";
			 $query3 = "SELECT * FROM Libraries Where LibrariesID ={$LibraryName}";
				$stmt3 = $con->prepare( $query3 );
				$stmt3->execute();
				while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					extract($row3);
				echo "<td>{$LibraryName}</td></tr>";
				}
			echo "<tr><td>Home Address 1:</td><td> {$HomeAddress1} </td></tr>";
			echo "<tr><td>HomeAddress 2:</td><td> {$HomeAddress2} </td></tr>";
			echo "<tr><td>City:</td><td> {$HomeCity} </td></tr>";
			echo "<tr><td>State:</td><td> {$HomeState} </td></tr>";
			echo "<tr><td>Zip:</td><td> {$HomeZip} </td></tr>";
			echo "<tr><td>Phone: </td><td> {$HomePhone} </td></tr>";
			echo "<tr><td>County:</td>";
			$query4 = "SELECT * FROM County Where CountyID ={$County}";
				$stmt4 = $con->prepare( $query4 );
				$stmt4->execute();
				while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
					extract($row4);
				echo "<td>{$County}</td></tr>";
				}
			echo "<tr><td>Email: </td><td> <a href='mailto:{$EmailAddress}'>{$EmailAddress}</a> </td></tr>";
			echo "<tr><td>Alt Contact: </td><td> {$AltContact} </td></tr>";
			echo "<tr><td>Senate & House Districts: </td><td> {$SenateDistrict}, {$HouseDistrict} </td></tr>";
			echo "<tr><td>USD:</td>";
			$query2 = "SELECT * FROM USD Where USDID ={$USD}";
				$stmt2 = $con->prepare( $query2 );
				$stmt2->execute();
				while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					extract($row2);
				echo "<td>{$USD}</td></tr>";
				}
			echo "<tr><td>Comment: </td><td> {$Comment} </td></tr>";
			echo "</table>";
			echo "<a href='editperson.php?perid={$PersonnelID}' class='customBtn'>Edit</a> | ";
			echo "<a href=delete.php?db=Personnel&id={$PersonnelID} class='customBtn'>Delete Person</a>";
			} 
	} else {
		echo "Person not found, contact Robin with information below: <br />";
		echo $query;
	}
	
	}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>

	</body>
</html>