<?php
	date_default_timezone_set('Asia/Kolkata');
	if(isset($_POST['submit']))
	{
		//$msg= "Working";
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mob=$_POST['mob'];
		$pass=$_POST['pass'];
		$token=date('smy');
		//connectio with db
		$con=mysqli_connect('localhost','root','','apple');
		//checking email availability
		$query=mysqli_query($con,"select * from users where email='$email'");
		$count=mysqli_num_rows($query);
		if($count>0)
		{
			$msg= "Email already Exists. Click Here to <a href=login.php> Login</a>";
		}
		else
		{
		$query="insert into users (name,email,mob,pass,token) values('$name','$email','$mob','$pass',$token)";
		$exec=mysqli_query($con,$query);
		
	
	if($exec)
	{
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'mailtoakil4@gmail.com';                 // SMTP username
	$mail->Password = 'Aki978658';                           // SMTP password
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->setFrom('ameygroups.in@gmail.com', 'Amey');
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject='Mail Verifcation';
	$mail->Body=
	'<h1 
	style="background:navy;color:white;padding:10px;text-align:center;">
	Email Verifcation</h1>
	<p>Hello '.$name.','. ' Your Verification Code is '.$token
	.'</p>';
	if(!$mail->send()) 
	{
	$msg='Message could not be sent.';
	$msg= 'Mailer Error: ' . $mail->ErrorInfo;

	} 
	else 
	{
	  $msg='You are registered successfully. Please verify your email.<br><a href="verify.php">Verify Now</a>';
	}
		
	}
	else
	{
		$msg='something wrong';
	}

	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>
		Project 3
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
					Registration Form
					</h5>
				</div>
				<div class="card-body bg-light">
					<form method="POST" action="index.php">
						<div class="form-group">
							<input class="form-control" name="name" placeholder="Enter Username" type="text" required="">
							</input>
						</div>
						<div class="form-group">
							<input class="form-control" name="email" placeholder="Enter Email" type="email" required="">
							</input>
						</div>
						<div class="form-group">
							<input class="form-control" name="mob" placeholder="Enter Mobile-No" type="text" required="">
							</input>
						</div>
						<div class="form-group">
							<input class="form-control" name="pass" placeholder="Choose Password" type="password" required="">
							</input>
						</div>
						<div class="text-center ">
							<input type="reset" name="reset" value="Reset" class="btn btn-danger ">
							
							<span class="text-center">
								<input type="submit" name="submit" class="btn btn-success " value="Register"></span>
								
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>