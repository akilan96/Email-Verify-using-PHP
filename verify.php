<?php 
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','apple');	
$token=$_POST['token'];
$fire=mysqli_query($con,"select * from users where token='$token'");
$row=mysqli_fetch_array($fire);
$count=mysqli_num_rows($fire);
if($count>0)
{
$email=$row['email'];
mysqli_query($con,"update users set status=1 where email='$email'");
$msg="Your account is verified now.<a href='login.php'>Click Here</a> to login";
}
else
{
	$msg="Email verification code not match.<br><a href='resent.php'>Re-send Code</a>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>
		Project First Page
		</title>
		<!--Required bootstrap css files-->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
	</link>
</link>
<style>
	.my
	{
		box-shadow: 0 10px grey;
	}
</style>
</meta>
</meta>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js" type="text/javascript">
</script>
<div class="container mt-5 ">
	<div class="row text-center">
		<div class="col-sm-4">
		</div>
		
		<div class="col-sm-4 text-center">
			<?php
					//setting error message here
			if(isset($msg)): ?>
			<div class="alert alert-warning">
				<strong>Alert !</strong>
				<?php echo $msg; ?>
			</div>
			<?php endif;?>
			<div class="card animated slideInDown">
				<div class="card-header text-center text-white bg-primary">
					<h5>
					Verification
					</h5>
				</div>
				<div class="card-body bg-light">
					<form method="POST" action="verify.php">
						<div class="form-group">
							<input class="form-control " name="token" placeholder="Enter Verification Code" type="text" required="">
							</input>
						<br>
						<div class="text-center ">
							<input type="submit" name="submit" value="Verify Now" class="btn btn-success ">
							
						
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>