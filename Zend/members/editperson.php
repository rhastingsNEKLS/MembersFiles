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
		<div id='pageContent' style="float: left; width=60%">
<?php
try {
	include 'libs/db_connect.php';
	
	//prepare query
	$query = "select 
				*
			from 
				Personnel
			where 
				PersonnelID = " . $_REQUEST['perid'];
	$query = $query . " limit 0,1";
			
	$stmt = $con->prepare( $query );
	
	//execute our query
	if($stmt->execute()){
	
		//store retrieved row to a variable
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//values to fill up our form
		$id = $row['PersonnelID'];
		$lastname = $row['LastName'];
		$firstname= $row['FirstName'];
		$libraryname = $row['LibraryName'];
		$address1 = $row['HomeAddress1'];
		$address2 = $row['HomeAddress2'];
		$city = $row['HomeCity'];
		$state = $row['HomeState'];
		$zip = $row['HomeZip'];
		$county = $row['County'];
		$phone = $row['HomePhone'];
		$email = $row['EmailAddress'];
		$altcontact = $row['AltContact'];
		$senate = $row['SenateDistrict'];
		$house = $row['HouseDistrict'];
		$comment = $row['Comment'];
		$usd = $row['USD'];
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
<form id='updateUserForm' action='updateperson.php' method='post' border='0'>
    <table>
        <tr>
        	<td>Personnel ID</td>
        	<td><input type='text' name='PersonnelID' value='<?php echo $id; ?>' /></td>
        </tr>
        <tr>
        	<td>Last Name</td>
        	<td><input type='text' name='LastName' value='<?php echo $lastname; ?>' /></td>
        </tr>
        <tr><td>
        	First Name
        </td>
        <td><input type='text' name='FirstName' value='<?php echo $firstname; ?>' /></td></tr>
        <tr>
        	<td>Library ID</td>
        	<td><input type='text' name='LibraryName' value='<?php echo $libraryname; ?>' /></td>
        </tr>
        <tr>
        	<td>Home Address 1</td>
        	<td><input type='text' name='HomeAddress1' value='<?php echo $address1; ?>' /></td>
        </tr>
        <tr>
        	<td>Home Address 2</td>
        	<td><input type='text' name='HomeAddress2' value='<?php echo $address2; ?>' /></td>
        </tr>
        <tr>
        	<td>City</td>
        	<td><input type='text' name='HomeCity' value='<?php echo $city; ?>' /></td>
        </tr>
        <tr>
        	<td>State</td>
        	<td><input type='text' name='HomeState' value='<?php echo $state; ?>' /></td>
        </tr>
        <tr>
        	<td>Zip</td>
        	<td><input type='text' name='HomeZip' value='<?php echo $zip; ?>' /></td>
        </tr>
        <tr>
        	<td>County</td>
        	<td><input type='text' name='PCounty' value='<?php echo $county; ?>' /></td>
        </tr>
        <tr>
        	<td>Phone</td>
        	<td><input type='text' name='HomePhone' value='<?php echo $phone; ?>' /></td>
        </tr>
        <tr>
        	<td>Email</td>
        	<td><input type='text' name='HomeEmail' value='<?php echo $email; ?>' /></td>
        </tr>
        <tr>
        	<td>Alt Contact</td>
        	<td><input type='text' name='AltContact' value='<?php echo $altcontact; ?>' /></td>
        </tr>
        <tr>
        	<td>Senate District</td>
        	<td><input type='text' name='SenateDistrict' value='<?php echo $senate; ?>' /></td>
        </tr>
        <tr>
        	<td>House District</td>
        	<td><input type='text' name='HouseDistrict' value='<?php echo $house; ?>' /></td>
        </tr>
        <tr>
        	<td>USD</td>
        	<td><input type='text' name='USD' value='<?php echo $usd; ?>' /></td>
        </tr>
        <tr>
        	<td>Comment</td>
        	<td><input type='text' name='Comment' value='<?php echo $comment; ?>' /></td>
        </tr>
        <tr>
        	<td colspan="2"><input type="submit" name="submit" value="Edit!" class="custombtn" /></td>
        </tr>
       </table>
</body></html>
