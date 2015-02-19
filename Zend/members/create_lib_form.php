<?php require_once("header.php"); ?>
		<div id='pageContent'>
<h2>Add A New Library</h2>
<form id='addLibForm' action='create_lib.php' method='post' border='0'>
    LibraryName<br />
    <input type='text' size="50" name='LibraryName' required /><br />
    Address1<br />
    <input type='text' size="50" name='Address1' required /><br />
    Address2<br />
    <input type='text' size="50" name='Address2' /><br />
    City: 
    <input type='text' name='City' required /> State: <input type='text' size= "2" name='State' required /> Zip: <input type='text' name='Zip' size="9" required /><br /><br />
    County<br />
        		Other: <input type="text" name="County" />
        		<select name="County">
        		<option selected="selected">Other (use text box to enter county)</option>
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
        	</select>
        	<br /><br />Phone: <input type='text' name='Phone' /> Fax: <input type='text' name='Fax' /><br />
        	
        	Email: <input type='text' name='Email' required /> Webpage: <input type='text' name='Webpage' /><br />
        	Hours<br />
        	<textarea name="Hours"></textarea><br />
        	Grant Class: 
        	<select name="GrantClass">
        		<?php
//include database connection
include 'libs/db_connect.php';
error_reporting('ALL');

//select all data
$query = "SELECT GrantClassID, GrantClass FROM GrantClass ORDER BY GrantClass desc";
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
			echo "<option value='{$GrantClassID}'>{$GrantClass}</option>";
		} 
}
?>
        	</select><br />
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
           <br />
           Academic: <input type='radio' name='Academic' value="True" /> Yes
            	<input type="radio" name="Academic" value="False" /> No<br />
            	Public: <input type='radio' name='Public' value="True" /> Yes
            	<input type="radio" name="Public" value="False" /> No<br />
            	Branch: <input type='radio' name='Branch' value="True" /> Yes
            	<input type="radio" name="Branch" value="False" /> No<br />
            	School: <input type='radio' name='School' value="True" /> Yes
            	<input type="radio" name="School" value="False" /> No<br />
            	Special: <input type='radio' name='Special' value="True" /> Yes
            	<input type="radio" name="Special" value="False" /> No<br />
            	Main:&nbsp;&nbsp; <input type='text' name='Main' /><br />

Notes: <textarea name="Notes"></textarea><br />           
                <input type='submit' value='Save' class='customBtn' />
           
</form>
</div>
</body>
</html>