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
    <title>Taco Blog Chat</title>
    <link type="text/css" rel="stylesheet" href="post_content_success.css"/>
</head>
<div class="picture_one">
	<h2 class = "ptitle">
		Taco Blog Home Page
	</h2>
</div>
<div id="wrapper">
    <div id="post">
        <h4>Search by Tag</h4>
        <form action="SearchPostResult.php">
            <input type="hidden" name="uname1" value="<?php if (isset($_SESSION)) {
                echo $_SESSION['uname'];
            } ?>">
            <input type="text" placeholder="Tag" name="tag">
            <button type="submit"
            "class="btn btn-success green"><i class="fa fa-share"></i>Search </button>
        </form>
    </div>
</div>
<section class="section">
	<form action="PostContentResult.php">
		<input type="hidden" name="uname" value="<?php if(isset($_SESSION)) {echo $_SESSION['uname'];}  ?>">
		<div>
			<input text type="text" placeholder="Add Title" name="title">
		</div>
		<div>
			<textarea placeholder="Add Content" name="content" style="height:20%;width:77%;">
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
						<?php echo "<br />"; ?>
						<?php echo $row['content']; ?>
						<?php echo "<br />"; ?>
						<?php echo "Post by: " . $row['username']; ?>
						|
						<?php echo "Date: ".$row['datetime']." | GMT"; ?>
					</div>
	            </div>
    	    </div>
						       <div id="wrapper">
            <?php
            $contentID = $row['contentID'];
            $result3 = mysqli_query($connection, "SELECT tagID FROM tags_content WHERE contentID = $contentID ");
            $num_rows = mysqli_num_rows($result3);
            if ($num_rows > 0) {
                while ($row3 = mysqli_fetch_array($result3)) {
                    $tagID = $row3['tagID'];
                    $result2 = mysqli_query($connection, "SELECT tagName FROM tags WHERE tagID = $tagID ");
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {
                            ?>
                            <?php
                            echo "" . $row2['tagName'] . ",";
                            ?>
                            <?php
                        }
                    }
                }
            }
            ?>
        </div>
        <div id="wrapper">
            <tr>
                <form action="AddTagResult.php">
                    <input type="hidden" name="contentID_tag" value="<?php echo $row['contentID']; ?>">
                    <input type="hidden" name="username_tag" value="<?php echo $row['username']; ?>">
                    <input type="hidden" name="username_session" value="<?php if (isset($_SESSION)) {
                        echo $_SESSION['uname'];
                    } ?>">
                    <input type="text" placeholder="Add Tag" name="tagName">
                    <input type="submit" value="Add Tag">
                </form>


            </tr>
            <tr>
                <form action="DeletePostResult.php">
                    <input type="hidden" name="contentID_del" value="<?php echo $row['contentID']; ?>">
                    <input type="hidden" name="title_del" value="<?php echo $row['title']; ?>">
                    <input type="hidden" name="uname_del" value="<?php echo $row['username']; ?>">
                    <input type="hidden" name="content_del" value="<?php echo $row['content']; ?>">
                    <input type="hidden" name="uname_ses" value="<?php if (isset($_SESSION)) {
                        echo $_SESSION['uname'];
                    } ?>">
                    <input type="submit" value="Delete">
                </form>
            </tr>
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
			Logout
		</a>
		<a href="index.html">
			Register
		</a>
        <?php
				    /*
        $currentUser = $_SESSION['uname'];
        $check = mysqli_query($connection, "SELECT isAdmin from users where username = '$currentUser' ");
        if($check)
        {
            ?>
            <a href="ContentAdmin.php">
                Admin
            </a>
            <?php
        }
	*/

        ?>
	</h3>
</section>
<section class="section">
	<h2 style="font-size:10px;">
		2018 © Big Taco Mind Control & Expensive Tacos Corporation |  All rights reserved.
	</h2>
</section>


