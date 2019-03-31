<?php
 $calc_tp= 'UPDATE items SET total_price= Quantity * Per_unit_buying_price';
  mysqli_query($conn, $calc_tp);
  ?>