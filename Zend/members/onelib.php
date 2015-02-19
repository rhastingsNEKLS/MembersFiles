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
	$query = "SELECT * FROM Libraries WHERE LibrariesID = '" . $_REQUEST['LibrariesID'] . "';";
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
            echo "<td>Library ID:</td><td> {$LibrariesID}</td></tr>";
			echo "<tr><td>LibraryName:</td><td> {$LibraryName} </td></tr>";
			echo "<tr><td>Address 1:</td><td> {$Address1} </td></tr>";
			echo "<tr><td>Address 2:</td><td> {$Address2} </td></tr>";
			echo "<tr><td>City:</td><td> {$City} </td></tr>";
			echo "<tr><td>State:</td><td> {$State} </td></tr>";
			echo "<tr><td>Zip:</td><td> {$Zip} </td></tr>";
			echo "<tr><td>Phone: </td><td> {$Phone} </td></tr>";
			echo "<tr><td>Fax:</td><td> {$Fax} </td></tr>";
			echo "<tr><td>County:</td>";
			$query4 = "SELECT * FROM County Where CountyID ={$County}";
				$stmt4 = $con->prepare( $query4 );
				$stmt4->execute();
				while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
					extract($row4);
				echo "<td>{$County}</td></tr>";
				}
			echo "<tr><td>Email: </td><td> <a href='mailto:{$Email}'>{$Email}</a> </td></tr>";
			echo "<tr><td>Webpage: </td><td> <a href='{$Webpage}'>{$Webpage}</a> </td></tr>";
			echo "<tr><td>Hours: </td><td> {$Hours} </td></tr>";
			echo "<tr><td>Grant Class: </td>";
			$query3 = "SELECT * FROM GrantClass Where GrantClassID ={$GrantClass}";
				$stmt3 = $con->prepare( $query3 );
				$stmt3->execute();
				while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					extract($row3);
				echo "<td>{$GrantClass}</td></tr>";
				}
			echo "<tr><td>USD:</td>";
			$query2 = "SELECT * FROM USD Where USDID ={$USD}";
				$stmt2 = $con->prepare( $query2 );
				$stmt2->execute();
				while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					extract($row2);
				echo "<td>{$USD}</td></tr>";
				}
			echo "<tr><td>Academic:</td><td> {$Academic} </td></tr>";
			echo "<tr><td>Public:</td><td> {$Public} </td></tr>";
			echo "<tr><td>Branch:</td><td> {$Branch} </td></tr>";
			echo "<tr><td>School:</td><td> {$School} </td></tr>";
			echo "<tr><td>Special: </td><td> {$Special} </td></tr>";
			echo "<tr><td>Main: </td><td> {$Special} </td></tr>";
			echo "<tr><td>Notes: </td><td> {$Notes} </td></tr>";
			echo "</table>";
			echo "<a href=libedit.php?libid={$LibrariesID} class='customBtn'>Edit Library</a> | ";
			echo "<a href=delete.php?db=Libraries&id={$LibrariesID} class='customBtn'>Delete Library</a>";
			} 
	} else {
		echo "Library not found, contact Robin with information below: <br />";
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