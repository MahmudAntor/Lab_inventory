<?php
	echo "Successfully Logged IN";
	
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>L0GIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/table.css">
   <link rel="stylesheet" href="css/homepage.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">

<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Name</th>
      <th scope="col">Issue date</th>
       <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Monitor</td>
      <td>10/12/2018</td>
      <td>10</td>
      <td>10000</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Mouse</td>
      <td>10/12/2018</td>
      <td>10</td>
      <td>500</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Keyboard</td>
      <td>10/12/2018</td>
      <td>10</td>
      <td>900</td>
    </tr>
  </tbody>
</table>
<button type="button" class="btn btn-primary">Edit</button>
<button type="button" class="btn btn-secondary">New entry</button>
<a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Log out</a>
</div>
</body>
</html>