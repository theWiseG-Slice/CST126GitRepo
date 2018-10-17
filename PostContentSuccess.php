<!--
Taco Blogs V 3.0
Login Page V 1.0
Programmers Roland, Kevin, Josh, Chuong
10/7/2018
Description:
     display all posts in html
Resources: PHP and MySQL web Development
<?php
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<script>
    $(document).ready(function () {
        $("[data-toggle=tooltip]").tooltip();
    });
</script>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taco's Blog</title>
    <link type="text/css" rel="stylesheet" href="post_content_success.css"/>
</head>
<div class="picture_one">
	<h2 class = "ptitle">
		Taco Blog Home Page
	</h2>
</div>

<section class="section">
	<form action="PostContentResult.php">
		<input type="hidden" name="uname" value="<?php if(isset($_SESSION)) {echo $_SESSION['uname'];}  ?>">
		<div>
			<input text type="text" placeholder="Add Title" name="title">
		</div>
		<div>
			<textarea placeholder="Add Content" name="content">
			</textarea>
		</div>
		<button type="submit" class="btn btn-success green">
			<i class="fa fa-share">
			</i>
			Add Post
		</button>
	</form>
</section>
</html>
<?php
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $username = 'b808da256c0eda';
    $password = '6a7d3dc1';
    $database = 'heroku_97591c0989c66a5';
$connection = mysqli_connect($host, $username, $password, $database);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
#$result = mysqli_query($connection, "SELECT * FROM content");
$result = mysqli_query($connection, "SELECT * from content ORDER BY postnumber DESC");
?>
<section class="section">
<div class="container">
    <div class="row">
        <h3>Previous Posts</h3>
    </div>
    <?php
    	while ($row = mysqli_fetch_array($result)) 
		{
    		?>
    		<div id="wrapper">
				<div id="header">
					<div id="post">
						<b>
							<?php echo "Title: ".$row['title'];?>
						</b>
						<?php echo $row['content']; ?>
						<?php echo "<br />"; ?>
						<?php echo "Post by: " . $row['username']; ?>
						<?php echo "<br />"; ?>
    					<?php echo "Date: ".$row['datetime']; ?>
					</div>
	            </div>
    	    </div>
        <?php
    	}
    	mysqli_close($connection);
    	?>
</div>
</section>
<section class = "section">
	<h3 class = "lightLink">
		<a href="Login.html">
			Login
		</a>
		<a href="index.html">
			Register
		</a>
	</h3>
</section>
<section class="section">
	<h2 style="font-size:10px;">
		2018 © Big Taco Mind Control & Expensive Tacos Corporation |  All rights reserved.
	</h2>
</section>


