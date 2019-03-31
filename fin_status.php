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

    $sql = 'SELECT i.Name, (i.Total_price - o.Total_price) AS Total_price 
	   FROM items as i, orders as o, contains as c WHERE i.item_id = c.item_id AND o.order_id = c.order_id 
	   GROUP BY i.Name ORDER BY i.Total_price DESC';
    //echo ''.$sql.'<br>';
    $query = mysqli_query($conn, $sql);
    /*$sql = 'SELECT * 
    FROM sales';
    
$query = mysqli_query($conn, $sql);*/
    if (!$query){
      die('SQL error : '.mysqli_error($conn));
    }
   ?>
<html>
<head>
  <title>INVENTORY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="style-table.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  <script src="jquery-3.2.1.min.js"></script>
  <script src="bootstrap.min.js"></script>
<style>
body{
	background-color: rgb(0,0,.1);
}
	
    /* -----------       tab css starts here -------------------*/

/* TABLE */ 
body {
			font-size: 30px;
			color: #4000ff;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
			//text-transform: uppercase;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 10px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 20px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 20px;
			min-width: 537px;
			
		
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
			border-color: black;
		}
		.data-table caption {
			color: #c63939;
			font-size:40px;
			margin: 10px;
			text-align:center;
		}

		/* Table Header */
		.data-table thead th {
		    background-color: #508abb;
			color: black;
			//border-color: #6ea1cc !important;
			text-transform: uppercase;
			//text-align:center;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: center;
		}

		.data-table tbody tr:nth-child td {
			background-color: #b3d9ff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  	crossorigin="anonymous"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>
<body>





<div id="DefaultOpen" class="tabcontent">
 
  
  <table class="data-table table table-responsive">
      <caption class="title">Financial Status</caption>
      <thead>
        <tr>
          <!-- <th>Item_id</th> -->
          <th>Name</th>
          <!-- <th>Quantity</th> -->
          <!-- <th>Per unit price</th> -->
          <th>Total price</th>
        </tr>
      </thead>
      <tbody>
        <?php
         //$sql = 'SELECT * FROM items';
          //$query = mysqli_query($conn, $sql);
          $no = 1;
          $total = 0;
          while ($row = mysqli_fetch_array($query)) {
            //$Total_price = $row['Total_price'] == 0 ? '' : number_format($row['Total_price']);
        echo '<tr>
        
        <td>'.$row['Name'].'</td>
        
		
		<td>'.$row['Total_price'].'</td>
          </tr>';
          $total += $row['Total_price'];
          $no++;
          }
        ?>
      </tbody> 
	 <tfoot>
        <tr class="danger">
          <th colspan="1">Total</th>
          <th> <?= number_format($total)?></th>
        </tr>
      </tfoot> 
     
    </table>
	<br><br>
</div>



<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 