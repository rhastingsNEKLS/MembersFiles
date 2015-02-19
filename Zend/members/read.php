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
$query = "SELECT * FROM Personnel ORDER BY PersonnelID desc";
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();
echo $num . " results returned<br />";
if($num>0){ //check if more than 0 record found

    echo "<table id='tfhover' class='tftable' border='1'>";//start table
    
        //creating our table heading
        echo "<tr>";
		echo "<th>Personnel ID</td>";
            echo "<th>First name</th>";
            echo "<th>Last name</th>";
            echo "<th>Library Name</th>";
			echo "<th>Home Address 1</th>";
			echo "<th>Home Address 2</th>";
			echo "<th>Home City</th>";
			echo "<th>Home State</th>";
			echo "<th>Home Zip</th>";
			echo "<th>County</th>";
			echo "<th>Home Phone</th>";
			echo "<th>Email Address</th>";
			echo "<th>Alt Contact</th>";
			echo "<th>Senate District</th>";
			echo "<th>House District</th>";
			echo "<th>Comment</th>";
			echo "<th>USD</th>";
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
            	echo "<td><a href='oneperson.php?perlook={$PersonnelID}' class='customBtn'>{$PersonnelID}</a></td>";
                echo "<td>{$FirstName}</td>";
                echo "<td>{$LastName}</td>";
               $query3 = "SELECT * FROM Libraries Where LibrariesID ={$LibraryName}";
				$stmt3 = $con->prepare( $query3 );
				$stmt3->execute();
				while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					extract($row3);
				echo "<td>{$LibraryName}</td>";
				}
                echo "<td>{$HomeAddress1}</td>";
				echo "<td>{$HomeAddress2}</td>";
				echo "<td>{$HomeCity}</td>";
				echo "<td>{$HomeState}</td>";
				echo "<td>{$HomeZip}</td>";
				$query4 = "SELECT * FROM County Where CountyID ={$County}";
				$stmt4 = $con->prepare( $query4 );
				$stmt4->execute();
				while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
					extract($row4);
				echo "<td>{$County}</td>";
				}
				echo "<td>{$HomePhone}</td>";
				echo "<td>{$EmailAddress}</td>";
				echo "<td>{$AltContact}</td>";
				echo "<td>{$SenateDistrict}</td>";
				echo "<td>{$HouseDistrict}</td>";
				echo "<td>{$Comment}</td>";
				$query2 = "SELECT * FROM USD Where USDID ={$USD}";
				$stmt2 = $con->prepare( $query2 );
				$stmt2->execute();
				while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					extract($row2);
				echo "<td>{$USD}</td>";
				}
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