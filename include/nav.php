<?php 
	if (!isset($admin_name)) {
		$admin_name = "Ratul";
	}
	$get_string = "?admin_name=$admin_name";
 ?>

<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="menu.php?admin_name=<?=$admin_name?>">Inventory Matters</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="add_item.php<?=$get_string?>">New Entry</a></li>
	      <li><a href="all_products.php<?=$get_string?>">Modify Entry</a></li>
	      <li><a href="outofstock.php">Out of Stock</a></li>
	      <li><a href="outofstock.php">Over Stock</a></li>
	      <li><a href="profit_calc.php">Profit</a></li>
	      <li><a href="customer.php">Customers</a></li>
	      <li><a href="Order.php">Order Report</a></li>
	      <li><a href="search_by.php">Search</a></li>
	      <li><a href="index.php">Log Out</a></li>
	    </ul>
	  </div>
	</nav>