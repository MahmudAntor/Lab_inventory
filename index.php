<?php
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		
		include('include/our_connect.php');
		
		$id=$_POST['id'];
		$pass=$_POST['password'];
		
		$sql="SELECT * FROM admin WHERE username='$id' AND password='$pass'";
		$mysqli_result=mysqli_query($conn,$sql); 
		if(!$mysqli_result) die(mysqli_error($conn));
		
		$count=mysqli_num_rows($mysqli_result);
		$row=mysqli_fetch_array($mysqli_result,MYSQLI_ASSOC);
		
		 if ($count == 1)
		    {
		    	session_start();
				$_SESSION['id']=$row['Username'];
				$_SESSION['name']=$row['Username'];
				$_SESSION['pass']=$row['Password'];
				header("Location: menu.php?admin_name={$row['Username']}");
			}
		mysqli_free_result($mysqli_result);
		mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>L0GIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/table.css">
   <link rel="stylesheet" href="css/homepage.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>

<body>
<div class="inventory" id="div1">inventory</div>
	
<div class="inventory matters">matters</div>

<div class="container"><br><br><br>
  <img class="in-middle logo" src="images/logo.png"> <br>
  <div class="row " >
    <div class="col-sm-3" ></div>
    <div class="col-sm-6">
        <form action="index.php" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                        <input class="form-control" type="text" name='id' placeholder="Username" required>          
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                        <input class="form-control" type="password" name='password' placeholder="Password" required>     
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-info col-sm-offset-4 col-sm-4 bgc-dark">Login</button>
                    </div>
                </form>      
    </div>


    <div class="col-sm-3"></div>
  </div><br>
  	  <?php if ($_SERVER["REQUEST_METHOD"]=="POST"): ?>
 <div class="row">
  <div class="alert alert-warning col-sm-offset-3 col-sm-6" style="text-align: center;"> <strong>Login failed!</strong> Please check your credentials and try again!</div></div>        
        <?php endif; ?>
</div>

<script type="text/javascript">
		$("document").ready(function(){
				$("#div1").hide().fadeIn(800);
				$(".matters").hide().delay(1000).fadeIn(function(){
				$(".matters").delay(1000).fadeOut("fast");
				$(".inventory").delay(1000).fadeOut("fast");
				});
				$(".container").hide().delay(3000).fadeIn("slow");
		});
</script>
</body>
</html>