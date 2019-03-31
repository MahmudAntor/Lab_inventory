<!DOCTYPE html>

<?php 
    $host = 'localhost' ;
    $user = 'root';
    $pass = '';
    $db = 'inventory';

      $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){
      die('Failed to connect to MySQL: '.mysqli_connect_error());
    }

    $sql = 'SELECT * FROM items';
    //echo ''.$sql.'<br>';
    $query = mysqli_query($conn, $sql);
    /*$sql = 'SELECT * 
    FROM sales';
    
$query = mysqli_query($conn, $sql);*/
    if (!$query){
      die('SQL error : '.mysqli_error($conn));
    }
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['item_name'];
    $all = 'SELECT * from ((inventory natural join items) natural join lot_details) where Name = \''.$name.'\' order by items.item_id ASC';
    $query = mysqli_query($conn, $all);

  }
    $admin_name = "";

   ?>
<html>
<head>
  <title>INVENTORY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/table.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<style>
</style>
	</head>
<body>
  <?php include('include/nav.php'); ?>

<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
    <li><a data-toggle="pill" href="#byquantity">By Quantity</a></li>
    <li><a data-toggle="pill" href="#bytp">By Total Price</a></li>
    <!-- <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
     <h3>Click any button above to view sorted list to search through</h3>
  
     <div class="row">
      <form action="search_by.php" method="POST">
       <div class="col-sm-offset-3 col-sm-5">
    
      <div class="form-group input-group">
      <span class="input-group-addon"><i class="fa fa-shopping-bag"> Item name</i></span>
      <input class="form-control" name="item_name" type="text">
    </div>
  </div>
  <button type="submit" class="btn btn-success bgc-dark">Search</button>
  </form>
</div>
  <?php if ($_SERVER["REQUEST_METHOD"]=="POST"): ?>
    <table class="table table-responsive data-table">
      <h1 class="txtgreen in-middle">Inventory Data</h1><br>
      <thead>
        <tr>
           <th>Lot_no</th> 
          <th>item_id</th>
          <th>name</th>
          <th>Quantity</th>
           <th>Per unit price(buying)</th>
          <th>Last Update Date</th>
           <!-- <th>Total buying price</th>  -->
           <th>Per unit price(selling)</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
          $no = 1;
          $total = 0;
          while ($row = mysqli_fetch_array($query)) {
            //$amount = $row['amount'] == 0 ? '' : number_format($row['amount']);
        echo '<tr>
        <td>'.$row['Lot_no'].'</td>
        <td>'.$row['Item_id'].'</td>
        <td>'.$row['Name'].'</td>
        <td>'.$row['Quantity'].'</td>
         <td>'.$row['Per_unit_buying_price'].'</td>
        <td>'.date("d-m-Y", strtotime($row['Last_Update_Date'])).'</td>
         
            <td>'.$row['per_unit_selling_price'].'</td>
          </tr>';
          // $total += $row['Total_price'];
          $no++;
          }
        ?>
      </tbody> 
     
    </table>


  <?php endif; ?>
</div>


     <div id="byquantity" class="tab-pane fade">
      <h3>Inventory Items List Sorted by their quantity:</h3>
  
  <table class="table table-responsive data-table">
      <thead>
        <tr>
          <th>Item_id</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Per unit price(buying)</th>
          <th>Total price</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = 'SELECT * FROM items ORDER BY Quantity desc';
          $query = mysqli_query($conn, $sql);
          $no = 1;
          $total = 0;
          while ($row = mysqli_fetch_array($query)) {
            $Total_price = $row['Total_price'] == 0 ? '' : number_format($row['Total_price']);
        echo '<tr>
        <td>'.$row['Item_id'].'</td>
        <td>'.$row['Name'].'</td>
        <td>'.$row['Quantity'].'</td>
    <td>'.$row['Per_unit_buying_price'].'</td>
    <td>'.$row['Total_price'].'</td>
          </tr>';
          $total += $row['Total_price'];
          $no++;
          }
        ?>
      </tbody> 
   <tfoot>
        <tr class="danger">
          <th colspan="4">Total</th>
          <th> <?= number_format($total)?></th>
        </tr>
      </tfoot> 
     
    </table>
  <br><br>
</div>

                                      <!-- ToTal PrIce StaRts -->

      <div id="bytp" class="tab-pane fade">

             <h3>Inventory Items List Sorted by their price:</h3>
    <table class="table table-responsive data-table">
      <thead>
        <tr>
          <th>Item_id</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Per unit price(buying)</th>
          <th>Total price</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = 'SELECT * FROM items order by Total_price desc';
          $query = mysqli_query($conn, $sql);
          $no = 1;
          $total = 0;
          while ($row = mysqli_fetch_array($query)) {
            $Total_price = $row['Total_price'] == 0 ? '' : number_format($row['Total_price']);
        echo '<tr>
        <td>'.$row['Item_id'].'</td>
        <td>'.$row['Name'].'</td>
        <td>'.$row['Quantity'].'</td>
    <td>'.$row['Per_unit_buying_price'].'</td>
    <td>'.$row['Total_price'].'</td>
          </tr>';
          $total += $row['Total_price'];
          $no++;
          }
      
        ?>
      </tbody> 
     <tfoot>
        <tr class="danger">
          <th colspan="4">Total</th>
          <th> <?= number_format($total)?></th>
        </tr>
      </tfoot>
    </table>
  <br><br>

      </div>
  </div>
</body>
</html> 