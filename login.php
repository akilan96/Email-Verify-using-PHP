<?php
	if(isset($_POST['submit']))
	{
		$con=mysqli_connect('localhost','root','','apple');
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$fire=mysqli_query($con,"select * from users where email='$email'");
		$row=mysqli_fetch_assoc($fire);
		$count=mysqli_num_rows($fire);
		if($count>0)
		{
		if($row['status']=='1')
		{
			if($row['pass']==$pass)
			{
				session_start();
			$_SESSION['email']=$email;
			header('location: home.php');
			}
			else
			{
				$msg="Password  Incorect. Try again";
			}
			
		}
		else
		{
			$msg="Your Account is not verified yet.<a href='verify.php'>Click Here</a> to verify";
		}
		}
		else
		{
			$msg="Your Email id does not match.<br><a href='index.php'>Click Here</a> for register";
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
					Login Form
					</h5>
				</div>
				<div class="card-body bg-light">
					<form method="POST" action="login.php">
					
						<div class="form-group">
							<input class="form-control" name="email" placeholder="Enter Email" type="email" required="">
							</input>
						</div>
						
						<div class="form-group">
							<input class="form-control" name="pass" placeholder="Choose Password" type="password" required="">
							</input>
						</div>
						
							
							<div class="text-center">
								<input type="submit" name="submit" class="btn btn-success " value="Login">
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>