<!DOCTYPE html>
<html>
<head>
	<title>Redirecting...</title>
	<script src="js/jquery.min.js"></script>

</head>
<style>
	@font-face {
             font-family: "ourFont";
             src: url("../fonts/Ubuntu-Medium.ttf");
             }
	body{
		background-color: #8ac1c8;
	}
	.error{
			margin-left: auto;
			margin-right: auto;
			display: block;
	}
	.heading{
		color: white;
		text-align: center;
		font-size: 70px;
		font-family: cursive;
	}
	h1 b {
		color: red;
	}
</style>
<body>
		<br><br><br>
	<div class="error">
		<img src="images/error.jpg" alt="Error Occured">
		<h1 class="heading"><b>Access denied.</b> <br>Please Log in to continue...</h1>
	</div>
<script type="text/javascript">
	$(document).ready(function () {
    // Handler for .ready() called.
    window.setTimeout(function () {
        location.href = "index.php";
    }, 2000);
});
</script>
</body>
</html>