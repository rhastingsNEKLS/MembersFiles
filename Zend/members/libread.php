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

//select all data
$query = "SELECT * FROM Libraries ORDER BY LibrariesID asc";
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();
echo $num . " results returned<br />";
if($num>0){ //check if more than 0 record found

    echo "<table id='tfhover' class='tftable' border='1'>";//start table
    
        //creating our table heading
        echo "<tr>";
            echo "<th>Library ID</th>";
            echo "<th>Library Name</th>";
			echo "<th>Address 1</th>";
			echo "<th>Address 2</th>";
			echo "<th>City</th>";
			echo "<th>State</th>";
			echo "<th>Zip</th>";
			echo "<th>Phone</th>";
			echo "<th>Fax</th>";
			echo "<th>County</th>";
			echo "<th>Email Address</th>";
			echo "<th>Webpage</th>";
			echo "<th>Hours</th>";
			echo "<th>Grant Class</th>";
			echo "<th>USD</th>";
			echo "<th>Academic</th>";
			echo "<th>Main</th>";
			echo "<th>Public</th>";
			echo "<th>Branch</th>";
			echo "<th>School</th>";
			echo "<th>Special</th>";
			echo "<th>Notes</th>";
        echo "</tr>";
        
        //retrieve our table contents
        //fetch() is faster than fetchAll()
        //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
            
            //creating new table row per record
            echo "<tr>";
            	echo "<td><a href='onelib.php?LibrariesID={$LibrariesID}' class='customBtn'>{$LibrariesID}</a></td>";
                $query5 = "SELECT * FROM Libraries Where LibrariesID ={$LibrariesID}";
				$stmt5 = $con->prepare( $query5 );
				$stmt5->execute();
				while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)){
				echo "<td>{$LibraryName}</td>";
				}
                echo "<td>{$Address1}</td>";
				echo "<td>{$Address2}</td>";
				echo "<td>{$City}</td>";
				echo "<td>{$State}</td>";
				echo "<td>{$Zip}</td>";
				echo "<td>{$Phone}</td>";
				echo "<td>{$Fax}</td>";
				$query4 = "SELECT * FROM County Where CountyID ={$County}";
				$stmt4 = $con->prepare( $query4 );
				$stmt4->execute();
				while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
					extract($row4);
				echo "<td>{$County}</td>";
				}
				echo "<td>{$Email}</td>";
				echo "<td>{$Webpage}</td>";
				echo "<td>{$Hours}</td>";
				$query3 = "SELECT * FROM GrantClass Where GrantClassID ={$GrantClass}";
				$stmt3 = $con->prepare( $query3 );
				$stmt3->execute();
				while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					extract($row3);
				echo "<td>{$GrantClass}</td>";
				}
				$query2 = "SELECT * FROM USD Where USDID ={$USD}";
				$stmt2 = $con->prepare( $query2 );
				$stmt2->execute();
				while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					extract($row2);
				echo "<td>{$USD}</td>";
				}
				echo "<td>{$Academic}</td>";
				echo "<td>{$Main}</td>";
				echo "<td>{$Public}</td>";
				echo "<td>{$Branch}</td>";
				echo "<td>{$School}</td>";
				echo "<td>{$Special}</td>";
				echo "<td>{$Notes}</td>";
            echo "</tr>";
        }
        
    echo "</table>";//end table
    
}

// tell the user if no records found
else{
    echo "<div class='noneFound'>No records found.</div>";
}

?>
</div></body></html>