<?php
try {
	include 'libs/db_connect.php';
	
	//prepare query
	$query = "select 
				*
			from 
				Personnel 
			where 
				PersonnelID = " . $_REQUEST['PersonnelID'];
	$query = $query . " limit 0,1";
			
	$stmt = $con->prepare( $query );
	
	//execute our query
	if($stmt->execute()){
	
		//store retrieved row to a variable
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//values to fill up our form
		$id = $row['PersonnelID'];
		$firstname = $row['FirstName'];
		$lastname = $row['LastName'];
		$libraryname = $row['LibraryName'];
		$homeaddress1 = $row['HomeAddress1'];
		echo $query;
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
<form id='updateUserForm' action='#' method='post' border='0'>
    <table>
        <tr>
            <td>Firstname</td>
            <td><input type='text' name='firstname' value='<?php echo $firstname; ?>' required /></td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td><input type='text' name='lastname' value='<?php echo $lastname;  ?>' required /></td>
        </tr>
        <tr>
            <td>Library Name</td>
            <td><input type='text' name='username'  value='<?php echo $libraryname;  ?>' required /></td>
        </tr>
        <tr>
            <td>Home Address 1</td>
            <td><input type='password' name='password' value='<?php echo $homeaddress1;  ?>' required/></td>
        <tr>
            <td></td>
            <td>
                <!-- so that we could identify what record is to be updated -->
                <input type='hidden' name='PersonnelID' value='<?php echo $id ?>' />
                <input type='submit' value='Update' class='customBtn' />
				
            </td>
        </tr>
    </table>
</form>
