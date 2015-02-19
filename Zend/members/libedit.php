<?php require_once("header.php"); ?>
		<div id='pageContent' style="float: left; width=60%">
<?php
try {
	include 'libs/db_connect.php';
	
	//prepare query
	$query = "select 
				*
			from 
				Libraries 
			where 
				LibrariesID = " . $_REQUEST['libid'];
	$query = $query . " limit 0,1";
			
	$stmt = $con->prepare( $query );
	
	//execute our query
	if($stmt->execute()){
	
		//store retrieved row to a variable
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//values to fill up our form
		$id = $row['LibrariesID'];
		$libraryname = $row['LibraryName'];
		$address1 = $row['Address1'];
		$address2 = $row['Address2'];
		$city = $row['City'];
		$state = $row['State'];
		$zip = $row['Zip'];
		$phone = $row['Phone'];
		$fax = $row['Fax'];
		$county = $row['County'];
		$email = $row['Email'];
		$webpage = $row['Webpage'];
		$hours = $row['Hours'];
		$grantclass = $row['GrantClass'];
		$usd = $row['USD'];
		$academic = $row['Academic'];
		$main = $row['Main'];
		$public = $row['Public'];
		$branch = $row['Branch'];
		$school = $row['School'];
		$special = $row['Special'];
		$notes = $row['Notes'];
	}else{
		echo "Unable to read record.";
		echo $query;
	}
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
<!--we have our html form here where new user information will be entered-->
<form id='updateUserForm' action='update_lib.php' method='post' border='0'>
    <table>
        <tr>
            <td>Library ID</td>
            <td><input type='text' name='LibrariesID' value='<?php echo $id; ?>' required /></td>
        </tr>
        <tr>
            <td>Library Name</td>
            <td><input type='text' name='LibraryName'  value='<?php echo $libraryname;  ?>' required /></td>
        </tr>
        <tr>
            <td>Address 1</td>
            <td><input type='text' name='Address1' value='<?php echo $address1;  ?>'/></td>
        <tr>
            <td>Address 2</td>
            <td><input type='text' name='Address2' value='<?php echo $address2; ?>'/></td>
            <td>
        </tr>
        <tr>
        	<td>City</td>
        	<td><input type='text' name='City' value='<?php echo $city; ?>'/></td>
        </tr>
        <tr>
        	<td>State</td>
        	<td><input type='text' name='State' value='<?php echo $state; ?>'/></td>
        </tr>
        <tr>
        	<td>Zip</td>
        	<td><input type='text' name='Zip' value='<?php echo $zip; ?>'/></td>
        </tr>
        <tr>
        	<td>Phone</td>
        	<td><input type='text' name='Phone' value='<?php echo $phone; ?>'/></td>
        </tr>
        <tr>
        	<td>Fax</td>
        	<td><input type='text' name='Fax' value=''<?php echo $fax; ?>'/></td>
        </tr>
        <tr>
        	<td>County</td>
        	<td><input type='text' name='County' value='<?php echo $county; ?>'/></td>
			
        </tr>
        <tr>
        	<td>Email</td>
        	<td><input type='text' name='Email' value='<?php echo $email; ?>'/></td>
        </tr>
        <tr>
        	<td>Webpage</td>
        	<td><input type='text' name='Webpage' value='<?php echo $webpage; ?>'/></td>
        </tr>
        <tr>
        	<td>Hours</td>
        	<td><input type='text' name='Hours' value='<?php echo $hours; ?>'/></td>
        </tr>
        <tr>
        	<td>Grant Class</td>
        	<td><input type='text' name='GrantClass' value='<?php echo $grantclass; ?>'/></td>
        </tr>
        <tr>
        	<td>USD</td>
        	<td><input type='text' name='USD' value='<?php echo $usd; ?>'/></td>
        </tr>
        <tr>
        	<td>Academic</td>
        	<td><input type='text' name='Academic' value='<?php echo $academic; ?>'/></td>
        </tr>
        <tr>
        	<td>Main</td>
        	<td><input type='text' name='Main' value='<?php echo $main; ?>'/></td>
        </tr>
        <tr>
        	<td>Public</td>
        	<td><input type='text' name='Public' value='<?php echo $public; ?>'/></td>
        </tr>
        <tr>
        	<td>Branch</td>
        	<td><input type='text' name='Branch' value='<?php echo $branc; ?>'/></td>
        </tr>
        <tr>
        	<td>School</td>
        	<td><input type='text' name='School' value='<?php echo $school; ?>'/></td>
        </tr>
        <tr>
        	<td>Special</td>
        	<td><input type='text' name='Special' value='<?php echo $special; ?>'/></td>
        </tr>
        <tr>
        	<td>Regional System</td>
        	<td><input type='text' name='RegionalSystem' value='<?php echo $regionalsys; ?>' /></td>
        </tr>
        <tr>
        	<td>Notes</td>
        	<td><input type='text' name='Notes' value='<?php echo $notes; ?>'/></td>
        </tr>
       </table>
                <!-- so that we could identify what record is to be updated -->
                <input type='hidden' name='LibrariesID' value='<?php echo $id ?>' />
                <input type='submit' value='Update' class='customBtn' />
</form>
</div>
<div style="float: right; width: 30%; margin-left: 5px;">
       	<h3>Counties:</h3>
       	<ul>
       		 <?php
       		$query4 = "SELECT * FROM County";
				$stmt4 = $con->prepare( $query4 );
				$stmt4->execute();
				while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
					extract($row4);
				echo "<li>{$CountyID} - {$County}</li>"; 
				}
       		?>
       	</ul>
       	<h3>Grant Classes:</h3>
       	<ul>
       		<?php
       		$query3 = "SELECT * FROM GrantClass";
				$stmt3 = $con->prepare( $query3 );
				$stmt3->execute();
				while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					extract($row3);
				echo "<li>{$GrantClassID} - {$GrantClass}</li>"; 
				}
       		?>
       	</ul>
       	<a href="listusd.php" target="_blank">Look up USD code</a>
       </div>
</body></html>