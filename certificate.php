


<?php 
//How to Generate Bulk Certificate

//connecting to database
if(isset($_POST['submit']))
	{
		//$msg= "Working";
		//font
		$font= realpath('arial.ttf');
		//image template
		$image=imagecreatefromjpeg("format.jpg");

		$color=imagecolorallocate($image, 51, 51, 102);

		$date=date('d F, Y');//Current Date 
		imagettftext($image, 18, 0, 880, 188, $color,$font, $date);

		$name=$_POST['name'];
		imagettftext($image, 48, 0, 120, 520, $color,$font, $name);
		
		imagejpeg($image,'$name.jpg');//Storing certificate here
//imagedestroy($image);

		//To download
          if(file_exists($name))
          {
		header('Content-Description:File Transfer');
		header('Content_Type:application/image');
		header('Content-Disposition:attachment; filename="'.basename($output).'"');
		header('Content-Length:' .filesize($output));
		readfile($name);
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
			
			<div class="card animated slideInDown">
				<div class="card-header text-center text-white bg-primary">
					<h5>
					Certification Form
					</h5>
				</div>
				<div class="card-body bg-light">
					<form method="POST">
						<div class="form-group">
							<input class="form-control" name="name" placeholder="Enter Username" type="text" required="">
							</input>
						</div>
						
						<div class="text-center ">
							<input type="submit" name="submit" value="Get Certificate" class="btn btn-danger ">
							
							
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

