<?php require_once("header.php"); ?>
		<div id='pageContent'>
<h2>Add A New Person</h2>
<form id='addUserForm' action='#' method='post' border='0'>
    Firstname <input type='text' name='FirstName' required /> Lastname <input type='text' name='LastName' required />
    <br />
    Library Name: <select name="LibraryName">
 <?php
//include database connection
include 'libs/db_connect.php';
error_reporting('ALL');

//select all data
$query = "SELECT LibrariesID, LibraryName FROM Libraries ORDER BY LibraryName asc";
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();

if($num>0){ //check if more than 0 record found
	    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
			echo "<option value='{$LibrariesID}'>{$LibraryName}</option>";
		} 
}
?>
   
            </select><br />
            Home Address 1<br />
            <input type='text' name='HomeAddress1' required /><br />
            Home Address 2<br />
            <input type='text' name='HomeAddress2' />
            <br />
            Home City: <input type='text' name='HomeCity' required /> Home State: <input type='text' size="2" name='HomeState' required /> Home Zip: <input type='text' size="9" name='HomeZip' required />
            <br />
            County<br />
        	Other: <input type="text" name="County" /><br />
        		<select name="County">
        		<option value="">Other (use text box below to enter county)</option>
        		<option value="1">Atchison</option>
        		<option value="2">Brown</option>
        		<option value="3">Doniphan</option>
        		<option value="4">Douglas</option>
        		<option value="5">Franklin</option>
        		<option value="6">Jackson</option>
        		<option value="7">Jefferson</option>
        		<option value="8">Johnson</option>
        		<option value="9">Leavenworth</option>
        		<option value="10">Miami</option>
        		<option value="11">Nemaha</option>
        		<option value="12">Osage</option>
        		<option value="13">Shawnee</option>
        		<option value="14">Wyandotte</option>
        	</select><br />
        	Home Phone: <input type='text' name='HomePhone' /> Email: <input type='text' name='EmailAddress' required /><br />
        	Alternate Contact: <input type='text' name='AltContact' /><br />
        	Senate District: <input type='text' size="4" name='SenateDistrict'/> House District: <input type='text' name='HouseDistrict' size="4" /><br />
        	Comment: <textarea name="Comment"></textarea><br />
        	USD:
            	<select name="USD">
            	<?php

//select all data
$query2 = "SELECT USDID, USD FROM USD ORDER BY USD desc";
$stmt2 = $con->prepare( $query2 );
$stmt2->execute();

//this is how to get number of rows returned
$num2 = $stmt2->rowCount();

if($num2>0){ //check if more than 0 record found
	    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row2);
			echo "<option value='{$USDID}'>{$USD}</option>";
		} 
}
?> 	
   </select>         	
                          
                <input type='submit' value='Save' class='customBtn' />
           
</form>
</div></body></html>