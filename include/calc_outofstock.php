<?php
$calc_oos1 = 'UPDATE out_stock, inventory set out_stock.OOS_status=\'No\', out_stock.OS_status=\'Yes\' 
		      WHERE inventory.Quantity > out_stock.Max_quant*0.80 AND inventory.entry_id = out_stock.entry_id';
	mysqli_query($conn, $calc_oos1);
	
	
	 $calc_oos2=  'UPDATE out_stock, inventory set out_stock.OOS_status=\'Yes\', out_stock.OS_status=\'No\'
        	 WHERE inventory.Quantity < out_stock.Min_quant*1.20 AND inventory.entry_id = out_stock.entry_id';
		mysqli_query($conn, $calc_oos2);
		
	
$calc_oos3 = 'UPDATE out_stock, inventory set out_stock.OOS_status='-', out_stock.OS_status='-' 
		      WHERE inventory.Quantity < out_stock.Max_quant*0.80 AND inventory.Quantity > out_stock.Min_quant*1.20 
			  AND inventory.entry_id = out_stock.entry_id';	
 mysqli_query($conn, $calc_oos3);
 
?> 