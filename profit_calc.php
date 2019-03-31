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

		
		
		$sql = 'SELECT i.Item_id, i.Name, ((i.per_unit_selling_price-i.per_unit_buying_price)*(sum(o.Order_Amount))) as Profit FROM items as i, orders as o, contains as c WHERE i.Item_id=c.Item_id AND c.Order_id=o.order_id group by i.Item_id';
		//echo ''.$sql.'<br>';
		$query = mysqli_query($conn, $sql);
		//$result=mysqli_store_result($conn);
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

	<div class="container">
		
		
		<table class="table table-responsive data-table">
			<h1 class="jumbotron txtgreen in-middle">Profit/Loss</h1>
			<thead>
				<tr>
				   <th>Item_Id</th>
				   <th>Item_name</th>
					
					<th>Profit/Loss</th>
					<!-- <th>Per unit price(selling)</th> -->
					
					<!-- <th>Total price</th> -->
					
					
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					//$total = 0;	
							
					while($row = mysqli_fetch_array($query)) {  
						//$amount = $row['amount'] == 0 ? '' : number_format($row['amount']);
				echo '<tr>
				<td>'.$row['Item_id'].'</td>
				<td>'.$row['Name'].'</td>
				
				
				<td>'.$row['Profit'].'</td>
					</tr>';
					// $total += $row['TP'];
					$no++;
					}
					

				?>
			</tbody> 
			<!-- <tfoot> -->
				<!-- <tr class = "danger"> -->
					<!-- <th colspan="4">Total</th> -->
					<!-- <th> <?= number_format($total)?></th> -->
				<!-- </tr> -->

			<!-- </tfoot> -->
			
		</table>
		
		
		
	</div>
</body>
</html>