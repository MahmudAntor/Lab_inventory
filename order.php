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

		
		$sql='Update orders, contains, items set orders.Total_price=orders.Order_Amount*items.per_unit_selling_price 
		     WHERE orders.order_id=contains.order_id AND contains.item_id=items.item_id';
			 mysqli_query($conn,$sql);
		$sql = 'SELECT i.Item_id, i.Name, SUM(o.Order_Amount) as OA , i.per_unit_selling_price, SUM(o.Total_price) as TP 
			FROM orders as o, contains as c, items as i  
            WHERE o.order_id = c.Order_id and c.item_id = i.Item_id
            GROUP BY i.Item_id';
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
	<title>Orders</title>
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
			<h1 class="jumbotron in-middle txtgreen">Order Summary</h1> <br>
			<thead>
				<tr>
				   <th>Item_Id</th>
				   <th>Item_name</th>
					
					<th>Order Amount</th>
					<th>Per unit price(selling)</th>
					
					<th>Total price</th>
					
					
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$total = 0;	
							
					while($row = mysqli_fetch_array($query)) {  
						//$amount = $row['amount'] == 0 ? '' : number_format($row['amount']);
				echo '<tr>
				<td>'.$row['Item_id'].'</td>
				<td>'.$row['Name'].'</td>
				
				<td>'.$row['OA'].'</td>
				<td>'.$row['per_unit_selling_price'].'</td>
				
				<td>'.$row['TP'].'</td>
					</tr>';
					$total += $row['TP'];
					$no++;
					}
					

				?>
			</tbody> 
			<tfoot>
				<tr class = "danger">
					<th colspan="4">Total</th>
					<th style="text-align: center;"> <?= number_format($total)?></th>
				</tr>

			</tfoot>
			
		</table>
		
		
		
	</div>
</body>
</html>