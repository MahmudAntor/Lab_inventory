<?php
    if(('' == $_GET['admin_name'])) header('Location: redirect.php');

    $MAX_LOT_CAP = 30;
		include('include/our_connect.php');
		include('include/inc_item_id.php');
        include('include/max_lot_no.php');
		$admin_name = $_GET['admin_name'];
				
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		
		include('include/inc_item_id.php');
		// $admin_name = 'Shatabdi';
		$entry_id = $item_id;
		
		//$item_id = 12;
		$name=$_POST['p_name'];
		//$des=$_POST['des'];
		$buying_price=$_POST['Per_unit_buying_price'];
		//$discount=$_POST['discount'];
		//$cost=$_POST['cost'];
		//$error="Product ID length should be 4.";
		//$date=$_POST['Last_update_date'];
		$Quantity=$_POST['Quantity'];
		//$Probable_date=$_POST['Probable_date'];
		$Min_quant=$_POST['Min_quant'];
		$Max_quant=$_POST['Max_quant'];
    $selling_price=$_POST['per_unit_selling_price'];
		
			$sql= "SELECT * FROM inventory WHERE entry_id='$entry_id'";
			$stid  = mysqli_query($conn, $sql);
      if (!$stid) die('stid');
			$info = mysqli_fetch_assoc($stid );

            
			
			if($lot_no < $MAX_LOT_CAP){
			if (0==mysqli_num_rows($stid)){
				$inv_insert="INSERT INTO inventory VALUES ( '$entry_id' , '$name', '$Quantity', curdate(), '$admin_name')";
				//$stid  = mysqli_query($conn, $inv_insert);
				$inv_query = mysqli_query($conn, $inv_insert);
        if (!$inv_query) die(mysqli_error($conn));
				
				
				//include('include/inc_item_id.php');
				$item_insert="INSERT INTO items VALUES ( '$item_id', '$name', '$Quantity' , '$buying_price', -1,'$selling_price', '$entry_id')";
				$item_query = mysqli_query($conn, $item_insert);
        if (!$item_query) die('item_query');
				include('include/calc_total_price.php');
				

        $out_insert = "INSERT INTO out_stock
				               VALUES ( '$Id', '$name' , '$Min_quant' , '$Max_quant', curdate(), '$entry_id', '-1', '-1')";	
                $outstock_query = mysqli_query($conn, $out_insert);
                if (!$outstock_query) die('outstock_query');
				
				
				
				include('include/calc_outofstock.php');

        $empty_lots='SELECT * FROM empty_lots';
        $empty_lots_result=mysqli_query($conn,$empty_lots);
        $row_empty_lots=mysqli_fetch_array($empty_lots_result, MYSQLI_ASSOC);
        if (!$empty_lots_result) {
          die(mysqli_error($conn));
         }
        $num_rows=mysqli_num_rows($empty_lots_result);
        if($num_rows>0){
         $empty_lot_entry = 'INSERT INTO lot_details (Item_id, Lot_no) (SELECT '.$item_id.' as Item_id, Lot_no FROM empty_lots order by Lot_no asc LIMIT 1)';
         $empty_lot_entry_result = mysqli_query($conn, $empty_lot_entry);
         if (!$empty_lot_entry_result) {
          die(mysqli_error($conn));
         }
         $queryn='SELECT Lot_no FROM empty_lots order by Lot_no asc LIMIT 1';
         $empty_lot_entry_result = mysqli_query($conn, $queryn);
         if (!$empty_lot_entry_result) die('empty_lot_entry_result');
         $row_empty_lot_entry = mysqli_fetch_array($empty_lot_entry_result, MYSQLI_ASSOC); 
         $delete='DELETE from empty_lots WHERE Lot_no='.$row_empty_lot_entry['Lot_no'];
         $chkerr=mysqli_query($conn,$delete);
                if (!$chkerr) {
                        die('deletion from empty_lots failed! '.mysqli_error($conn));
         }
        }

        else{ 
				$lot_entry = "INSERT INTO lot_details VALUES ('$item_id', '$Lot_no')";
			   $lot_query = mysqli_query($conn, $lot_entry);
         if (!$lot_query) die('lot_query');
				}
				
				
				//$updateq= "UPDATE items, inventory SET items.Total_price = items.Quantity * items.Per_unit_price WHERE items.entry_id = inventory.entry_id
				
				header('Location: show_all_products.php');
			} 
			else{
				$error="This ID already used.";
			} }
		//}
		else { 
           header('Location:unable.php');
             }
	} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add them all</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/all.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style type="text/css">
      fieldset {
        /*height: 500px;*/
        background-color: lavender;//#ffffe6;
      }
     
</style>
</head>
<body> <?php include('include/nav.php'); ?>
    
     <div class="container"> <br><br><br>
        <div class="row">
           <div class="col-sm-offset-1 col-sm-10">
              <form method="post" action="add_item.php?admin_name=<?=$admin_name?>">
              <fieldset style="border: 2px solid skyblue">
                <legend class="in-middle txtdark"> Add New Items </legend>
                 <div class="row">
                  <div class="col-sm-offset-1 col-sm-10">
                    <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"> Entry no:</i></span>
                            <input class="form-control" type="text" name='entry_id' placeholder="ID" value="<?= $item_id ?>" readonly>          
                        </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-users"> Admin</i></span>
                        <input class="form-control" type="text" name='admin_name'  value="<?= $_GET['admin_name'] ?>" readonly> 
                    </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-cube"></i> Name</span>
                            <input class="form-control" type="text" name='p_name' placeholder="Name" required>          
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-shopping-bag"> Quantity</i></span>
                            <input class="form-control" type="text" name='Quantity' placeholder="quantity in kg" required>        
                        </div>
                  
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-usd"> Price per unit(buying)</i></span>
                            <input class="form-control" type="text" name='Per_unit_buying_price' placeholder="Buying price per unit in taka" required> </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-sort-amount-desc"> Max Quantity</i></span>
                            <input class="form-control" type="text" name='Max_quant' placeholder="Maximum quantity before overstock " required>
                        </div> 

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-sort-amount-asc"> Min Quantity</i></span>
                            <input class="form-control" type="text" name='Min_quant' placeholder="Minimum quantity before out of stock" required>
                        </div>     

                         <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-usd"> Price per unit(selling)</i></span>
                            <input class="form-control" type="text" name='per_unit_selling_price' placeholder="Selling price per unit in taka" required>
                        </div>                         
                        
                <button class="btn btn-primary col-sm-offset-5 col-sm-2" type="submit"> Add </button> <br><br>
              </div>
              </fieldset>
            </form>
           </div> 
         
        </div>  
    </div>    
</body>
</html>