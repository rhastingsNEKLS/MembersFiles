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
	$query = "SELECT * FROM USD WHERE USDID = '" . $_POST['usdlook'] . "';";
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
            echo "<td>USD ID:</td><td> {$USDID}</td></tr>";
			echo "<tr><td>USD:</td><td> {$USD} </td></tr>";
			echo "<tr><td>Address 1:</td><td> {$Address1} </td></tr>";
			echo "<tr><td>Address 2:</td><td> {$Address2} </td></tr>";
			echo "<tr><td>City:</td><td> {$City} </td></tr>";
			echo "<tr><td>State:</td><td> {$State} </td></tr>";
			echo "<tr><td>Zip:</td><td> {$Zip} </td></tr>";
			echo "<tr><td>County:</td>";
			$query4 = "SELECT * FROM County Where CountyID ={$County}";
				$stmt4 = $con->prepare( $query4 );
				$stmt4->execute();
				while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
					extract($row4);
				echo "<td>{$County}</td></tr>";
				}
			echo "<tr><td>District Superindendent: </td>";
			$query3 = "SELECT * FROM Personnel Where PersonnelID ={$DistrictSuperintendent}";
				$stmt4 = $con->prepare( $query3 );
				$stmt4->execute();
				while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
					extract($row4);
				echo "<td>{$County}</td></tr>";
				}
			echo "<tr><td>District Media Contact: </td><td>{$DistrictMediaContact}</td></tr>";
			echo "<tr><td>Media Contact Email: </td><td> {$MediaContactEmail} </td></tr>";
			echo "</table>";
			} 
	} else {
		echo "USD not found, contact Robin with information below: <br />";
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