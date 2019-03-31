<!DOCTYPE html>
<?php 
		$host = 'localhost'	;
		$user = 'root';
		$pass = '';
		$db = 'inventory';

			$conn = mysqli_connect($host, $user, $pass, $db);
		if(!$conn){
			die('Failed to connect to MySQL: '.mysqli_connect_error());
		}

		$sql = 'SELECT Customer_Id, Name, Contact_no, sum(Total_price) as payments
			FROM customers as c, orders as o
			where c.Customer_Id = o.C_id
			group by Name
			order by Customer_Id asc';
		//echo ''.$sql.'<br>';
		$query = mysqli_query($conn, $sql);
		/*$sql = 'SELECT * 
		FROM inventory';
		
$query = mysqli_query($conn, $sql);*/
		if (!$query){
			die('SQL error : '.mysqli_error($conn));
		}
	 ?>
<html>
<head>
	<title>INVENTORY</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/all.css">
	  <link rel="stylesheet" href="css/table.css">
	  <script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		
	</style>

</head>
<body>
	<?php include('include/nav.php'); ?>

	<div class="container container-fluid">
		
		
		<table class="data-table table table-responsive">
			<h1 class="in-middle txtgreen">Customer's Information</h1><br>
			<thead>
				<tr>
					<th>Customers ID</th>
					<th>Customer Name</th>
					<th>Contact No.</th>
					<th>Payments</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$total = 0;
					while ($row = mysqli_fetch_array($query)) {
						//$amount = $row['amount'] == 0 ? '' : number_format($row['amount']);
				echo '<tr>
				<td>'.$row['Customer_Id'].'</td>
				<td>'.$row['Name'].'</td>
				<td>'.$row['Contact_no'].'</td>
				<td>'.$row['payments'].'</td>
				
					</tr>';
					$no++;
					}
				?>
			</tbody> 
			
		</table>
		
		
		
	</div>
</body>
</html>