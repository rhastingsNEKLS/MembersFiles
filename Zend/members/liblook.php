<br />
<table border="0" width="60%">
	<tr><td>
		<form id="lookuplib" action='onelib.php' method='post' border='0'>
	<?php
//include database connection
include 'libs/db_connect.php';

//select all data
$query = "SELECT LibrariesID, LibraryName FROM Libraries ORDER BY LibrariesID asc";
$stmt = $con->prepare( $query );
$stmt->execute();
//this is how to get number of rows returned
$num = $stmt->rowCount();
echo " <select name='LibrariesID'>";
//retrieve our table contents
        //fetch() is faster than fetchAll()
        //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
echo "<option value='{$LibrariesID}'>{$LibraryName}</option>";
		}
echo "</select> </td><td> <input type='submit' value='Find Library' class='customBtn' />"
?>
</form>
</td></tr><tr><td>
<form id="lookupusd" action="oneusd.php" method="post">
<?php 
$usdquery = "SELECT USDID, USD FROM USD ORDER BY USD asc";
$ustmt = $con->prepare( $usdquery );
$ustmt->execute();
echo " <select name='usdlook'>";
	while ($urow = $ustmt->fetch(PDO::FETCH_ASSOC)){
		extract($urow);
		echo "<option value='{$USDID}'>{$USD}</option>";
	}
echo "</select> </td><td> <input type='submit' value='Find USD' class='customBtn' />";
?>
</td></tr><tr><td>
</form>

<form id="lookupperson" action="oneperson.php" method="post">
<?php
$personquery = "SELECT PersonnelID, LastName, FirstName From Personnel ORDER BY LastName asc";
$pstmt = $con->prepare( $personquery );
$pstmt->execute();
echo " <select name='perlook'>";
	while ($prow = $pstmt->fetch(PDO::FETCH_ASSOC)){
		extract($prow);
		echo "<option value='{$PersonnelID}'>{$FirstName} {$LastName}</option>";
	}
echo "</select> </td><td> <input type='submit' value='Find Person' class='customBtn' />";
?>
	
</form></td>
</tr>
</table>