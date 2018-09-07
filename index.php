<?php
        echo "Welcome to Taco Blogs";
		$servername = "localhost";
		$username = "root";
		$passowrd = "root";
		$tacoDB = "try1";

		$conn = new mysqli($servername,$username,$passowrd,$tacoDB);
		if($conn -> connect_error){
			die("Connection Failed: " . $conn->connect_error);
		}

?>
<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> Taco Blog </title>
	</head>
	<body>
		<form role="form" method="post" action="" autocomplete="off">
			<div class="form-group">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1"> <!-- username text field-->
        	</div>
        	<div class="form-group">
        		<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">	<!-- email text field-->
        	</div>
        	<div class="row">
        		<div class="col-xs-6 col-sm-6 col-md-6">
            		<div class="form-group">
                		<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
                	</div>		<!-- password text field-->
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
            		<div class="form-group">
                		<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
                	</div>		<!-- password_confirmation text field-->
            	</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5">
				</div>		<!-- submit button-->
			</div>
		</form>
	</body>
</html>

