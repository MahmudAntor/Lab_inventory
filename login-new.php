<?php
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		
		include('include/our_connect.php');
		
		$id=$_POST['id'];
		$pass=$_POST['password'];
		
		$sql="SELECT * FROM admin WHERE username='$id' AND password='$pass'";
		$mysqli_result=mysqli_query($conn,$sql); 
		
		$count=mysqli_num_rows($mysqli_result);
		$row=mysqli_fetch_array($mysqli_result,MYSQLI_ASSOC);
		
		 if ($count == 1)
		    {
		    	session_start();
				$_SESSION['id']=$row["username"];
				$_SESSION['name']=$row["username"];
				$_SESSION['pass']=$row["password"];
				header('Location: menu.php');
			}
		mysqli_free_result($mysqli_result);
		mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>L0GIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style type="text/css">
    
</style>
</head>

<body>

<div class="container-fluid"><br><br><br>
  <img class="logo" src="images/logo.png"> <br>
  <div class="row " >
    <div class="col-sm-3" style="background-color:lavender;"></div>
    <div class="col-sm-6">
        <form name="frm_login" action="login-new.php" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                        <input class="form-control" type="text" name='id' placeholder="ID"/>          
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                        <input class="form-control" type="password" name='password' placeholder="Password"/>     
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-info in-middle col-sm-3">Login</button>
                    </div>
                </form>      
    </div>


    <div class="col-sm-3" style="background-color:lavender;"></div>
  </div>
  	  <?php if ($_SERVER["REQUEST_METHOD"]=="POST"): ?>
 <div class="row">
  <div class="alert alert-warning logo col-sm-5" style="text-align: center;"> <strong>Error!</strong> Please check your credentials and try again!</div></div>        
        <?php endif; ?>
</div>

</body>
</html>