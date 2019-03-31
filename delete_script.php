<?php
		$entry_id = $_GET['passed'];
		$item_id = $entry_id;
		$admin_name = $_GET['admin_name'];
		include('include/our_connect.php');
				// save empty lot code goes here
         $before_delete ='INSERT INTO empty_lots (Lot_no) (SELECT
    Lot_no
FROM
    lot_details
WHERE Item_id in
   (SELECT Item_id FROM items WHERE entry_id in 
    (SELECT entry_id FROM inventory WHERE entry_id='.$entry_id.')))'; 
         $before_delete_result=mysqli_query($conn, $before_delete);
         if (!$before_delete_result) {
         	# code...
         	die(mysqli_error($conn));
         }
  //        $count=mysqli_num_rows($before_delete_result);
		// $row=mysqli_fetch_array($before_delete_result,MYSQLI_ASSOC);

		


		        // delete query starts
		$sql_delete = 'DELETE FROM inventory WHERE entry_id = '.$entry_id;
		$chkqry = mysqli_query($conn, $sql_delete);
		        // delete query end

				//stop auto increment of deleted lot_no
		$auto_lot_no = 'alter table lot_details Auto_increment = 1';
		mysqli_query($conn, $auto_lot_no);
				//end auto increment of deleted lot_no

		if (!$chkqry){
			die('SQL error! '. mysqli_connect_error($conn));
		}

		header('Location: all_products.php?admin_name='.$admin_name);
?>