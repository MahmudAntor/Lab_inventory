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
        $sql=  '\'UPDATE out_stock, inventory set out_stock.OOS_status=\'Yes\', out_stock.OS_status=\'No\'\n"

         . "        		WHERE inventory.Quantity < out_stock.Min_quant*1.20 AND inventory.entry_id = out_stock.entry_id"';
		mysqli_query($conn, $sql);
		$sql= '\'UPDATE out_stock, inventory set out_stock.OOS_status=\'No\', out_stock.OS_status=\'Yes\' 
		      WHERE inventory.Quantity > out_stock.Max_quant*0.80 AND inventory.entry_id = out_stock.entry_id';
        mysqli_query($conn, $sql);
       $sql= 'UPDATE out_stock, inventory set out_stock.OOS_status=\'-\', out_stock.OS_status=\'-\' WHERE inventory.Quantity < out_stock.Max_quant*0.80 AND inventory.Quantity > out_stock.Min_quant*1.20 AND inventory.entry_id = out_stock.entry_id';		
			  mysqli_query($conn, $sql);
		$sql = 'SELECT * 
			FROM out_stock';
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
	<title>Out of stock status</title>
	<meta charset="utf-8">
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
			<h1 class="in-middle txtgreen">Out Of Stock & Overstock Report</h1> <br>
			<thead>
				<tr>
					<th>Id</th>
					<th>Item Name</th>
					<th>Min Quantity</th>
					<th>Max Quantity</th>
					<th>Probable Date</th>
					<th>OOS_status</th>
					<th>OS_status</th>
					
					
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$total = 0;
					while ($row = mysqli_fetch_array($query)) {
						//$amount = $row['amount'] == 0 ? '' : number_format($row['amount']);
				echo '<tr>
				<td>'.$row['Id'].'</td>
				<td>'.$row['Item_name'].'</td>
				<td>'.$row['Min_quant'].'</td>
				<td>'.$row['Max_quant'].'</td>
				<td>'.date("d-m-Y", strtotime($row['Probable_date'])).'</td>
				<td>'.$row['OOS_status'].'</td>
				<td>'.$row['OS_status'].'</td>
				
					</tr>';
					$no++;
					}
				?>
			</tbody> 
			
		</table>
		
		
		
	</div>
</body>
</html>