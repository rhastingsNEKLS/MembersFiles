<html><title>USD List</title>
	<body>
		<?php include 'libs/db_connect.php'; ?>
<h3>Grant Classes:</h3>
       	<ul>
       		<?php
       		$query = "SELECT * FROM USD";
				$stmt = $con->prepare( $query );
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row);
				echo "<li>{$USDID} - {$USD}</li>"; 
				}
       		?>
       	</ul>
</body></html>