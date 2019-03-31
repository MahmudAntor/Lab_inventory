<!DOCTYPE html>
<?php
	if(('' == $_GET['admin_name'])) header('Location: redirect.php');
	$admin_name = $_GET['admin_name'];
	$get_string = "admin_name=$admin_name";
	include('include/our_connect.php');
?>
<html>
<head>
	<title>Modify Entries</title>

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
			<h1 class="in-middle txtgreen">Inventory Data</h1> <br>
			<thead>
				<tr>
					<th>entry_id</th>
					<th>p_name</th>
					<th>Quantity</th>
					<th>Last_Update_Date</th>
					<th>Admin_name</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$total = 0;
					$sql = 'SELECT * FROM inventory';
					$query = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($query)) {
						//$amount = $row['amount'] == 0 ? '' : number_format($row['amount']);
				echo '<tr>
				<td>'.$row['entry_id'].'</td>
				<td>'.$row['p_name'].'</td>
				<td>'.$row['Quantity'].'</td>
				<td>'.date("d-m-Y", strtotime($row['Last_Update_Date'])).'</td>
					<td>'.$row['Admin_name'].'</td>
					<td><a href="edit_script.php?passed='.$row['entry_id'].'&admin_name='.$admin_name.'" class="btn btn-info" role="button"><i class="fa fa-pencil-square-o"><i> Edit</a></td>
					<td><a href="delete_script.php?passed='.$row['entry_id'].'&admin_name='.$admin_name.'" class="btn btn-primary" role="button"><i class="fa fa-trash-o"><i> Delete</a></td>
					</tr>';
					$no++;
					}
				?>
			</tbody> 
			
		</table>
		
		
							<!-- modal starts here    -->
</body>
</html>