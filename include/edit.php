<?php
	include('connect.php');
	$id=$_POST['entry_id'];
	$name=$_POST['p_name'];
	$Quantity(kg)=$_POST['Quantity(kg)'];
	$Last Upadate Date=$_POST['Last Update Date'];
	$Admin_name=$_POST['Admin_name'];
	$sql="UPDATE inventory set entry_id='$id',p_name='$name',Quantity(kg)='$Quantity(kg)',Admin_name='$Admin_name WHERE entry_id='$id'";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
	echo "1";
?>