<?php
if(('' == $_GET['admin_name'])) header('Location: redirect.php');
$admin_name = $_GET['admin_name'];
$get_string = "?admin_name=$admin_name";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/all.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style type="text/css">
      .in-middle{
      display: block;
      margin-left: auto;
      margin-right: auto;
      text-align: center; }
      
</style>
</head>
<body>
	<div class="container">
			<br><p class="in-middle txtdark font-spirax" style="font-size: 50px;"><b>All Menus</b></p>
		<br>
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10">
				<div class="row">
					
					<div class="col-sm-4">
						<a href="show_all_products.php<?=$get_string?>" class="btn btn-block box"><h2 class="page-heading">Show all Products</h2></a>
					</div>

					<div class="col-sm-4">
						<a href="add_item.php<?=$get_string?>" class="btn btn-block box"><h2 class="page-heading">New Entry</h2></a>
					</div>

					<div class="col-sm-4">
						<a href="all_products.php<?=$get_string?>" class="btn btn-block box"><h2 class="page-heading">Modify Entries</h2></a>
					</div> 
				</div> <br><br>

				<div class=row>

					<div class="col-sm-4"><br><br><br>
						<a href="outofstock.php" class="btn box"><h2 class="page-heading">Out Of Stock/Overstock</h2></a>
					</div>

					<div class="col-sm-4">
						<img class="img-responsive" src="images/logo.png" alt="logo">
					</div>

					<div class="col-sm-4"><br><br><br>
						<a href="profit_calc.php" class="btn box"><h2 class="page-heading">Profit</h2></a>
					</div>

				</div><br><br>

				<div class=row>

					<div class="col-sm-4">
						<a href="Order.php" class="btn box"><h2 class="page-heading">Orders Report</h2></a>
					</div>

					<div class="col-sm-4">
						<a href="customer.php" class="btn box"><h2 class="page-heading">Customers Information</h2></a>
					</div>

					<div class="col-sm-4">
						<a href="search_by.php" class="btn box"><h2 class="page-heading">Search by</h2></a>
					</div>

				</div>
			
		</div>
	</div>
</body>
</html>