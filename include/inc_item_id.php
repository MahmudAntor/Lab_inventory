<?php
$ainc_sql = 'select Item_id from items order by Item_id desc limit 1';
$ainc_result = mysqli_query($conn, $ainc_sql);
$ainc_row = mysqli_fetch_array ($ainc_result);

$item_id = $ainc_row['Item_id'] + 1;


?>