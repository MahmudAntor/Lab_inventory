<?php

$lot_no_q  = 'select Lot_no from lot_details order by Lot_no desc limit 1';
$lot_result = mysqli_query($conn, $lot_no_q);
$lot_row = mysqli_fetch_array ($lot_result);

$lot_no = $lot_row['Lot_no'];

?>