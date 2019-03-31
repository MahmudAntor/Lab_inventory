<?php
 $admin_name = $_GET['admin_name'];
 include('include/our_connect.php');
  	if ($_SERVER["REQUEST_METHOD"] == "POST"){
  		$entry_id = $_POST['entry_id'];
  		$name = $_POST['id'];
  		$Quantity = $_POST['quantity'];
  		$lu_date = $_POST['date'];
  		//$admin_name = $_GET['admin_name'];
	 		
	 	$sql_edit = 'UPDATE inventory set p_name = \''.$name.'\', Quantity =  '.$Quantity.', Last_Update_Date = curdate(), Admin_name = \''.$admin_name.'\' WHERE entry_id = '.$entry_id;
	 	if (mysqli_query($conn, $sql_edit)) {
	 		header('Location: all_products.php?admin_name='.$admin_name);
	 	} 
	 	else die('SQL error in $sql_edit: '. mysqli_error($conn));
	 }
	 	
  
  else{
  $entry_id =  $_GET['passed'] ;
  $sql_simpl = 'SELECT * FROM inventory where entry_id = '.$entry_id;
  $query_op = mysqli_query($conn, $sql_simpl);

  if ($query_op) {
  	$r = mysqli_fetch_array($query_op);
  	
  } else {
  	die('SQL error: '. mysqli_error($conn));
  }
} 

    date_default_timezone_set("Asia/Dhaka");
    $d = strtotime("Today");
    $curdate = date("d-m-Y", $d);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit them all</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
              <form  action="edit_script.php?admin_name=<?=$admin_name?>" method="post">
              <fieldset style="border: 1px solid skyblue">
                <legend> <h3 class="in-middle">Edit Entries</h3> </legend>
                 <div class="row">
                  <div class="col-sm-offset-1 col-sm-10">

                  	<div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-hashtag"> Entry Id</i></span>
                            <input class="form-control" type="text" name='entry_id' value="<?= $r['entry_id'] ?>" readonly> </div><br> 

                            <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-users"> Admin</i></span>
                        <input class="form-control" type="text" name='admin_name'  value="<?= $admin_name ?>" readonly> 
                    </div><br>

                    <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-shopping-cart"> Item Name </i></span>
                            <input class="form-control input-sm" type="text" name='id' value="<?=$r['p_name']?>" required>          
                        </div><br>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"> Last updated date </i></span>
                            <input class="form-control" type="text" name='date' value="<?= $curdate  ?> " required>          
                        </div><br>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-shopping-bag"> Quantity </i></span>
                            <input class="form-control" type="text" name='quantity' value="<?=$r['Quantity']?>" required>        
                        </div>    
                        
                <button class="btn btn-primary col-sm-offset-5 col-sm-2 " type="submit"> Edit </button> <br><br>
              </div>
              </fieldset>
            </form>
           </div> 
         
        </div>  
    </div>    
</body>
</html>