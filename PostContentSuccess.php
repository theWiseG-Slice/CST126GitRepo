<?php

?>
<script>
    $(document).ready(function () {
        $("[data-toggle=tooltip]").tooltip();
    });
</script>
<html lang ="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> Taco Blog </title>
		<link rel="stylesheet" href="post_content_success.css">
	</head>
	<body>
		<div class="picture_one">
			<h2 class = "ptitle">
				Taco's Blog Page
			</h2>
		</div>
		<section class ="section">
			<div id="post">
				<h4>
					Search by a Tag
				</h4>
				<?php
			        if($_GET["value"]!=NULL)
					$_SESSION["uname"] = $_GET["value"];
				?>
        		<form action="SearchPostResult.php">
					<input type="hidden" name="uname1" value="<?php if (isset($_SESSION)) {echo $_SESSION['uname'];} ?>">
					<input type="text" placeholder="Tag" name="tag">
					<button type="submit" class="btn btn-success green">
						<i class="fa fa-share">
							Search
						</i>
					</button>
				</form>
			</div>
		</section>
		<section class="section">
			<h3>Add New Post</h3>
				<div class="widget-area no-padding blank">
					<div class="status-upload">
						<form action="PostContentResult.php">
							<input type="hidden" name="uname" value="<?php if (isset($_SESSION)) {echo $_SESSION['uname'];} ?>">
							<div>
								<input type="text" placeholder="Add Title" name="title">
							</div>
							<div>
								<textarea placeholder="Add Content" name="content">
								</textarea>
							</div>
							<div>
								<button type="submit" class="btn btn-success green">
									<i class="fa fa-share">
									</i>
									Add Post
								</button>
							</div>
						</form>
					</div>
				</div>
		</section>
	</body>
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
$result = mysqli_query($connection, "SELECT * FROM content");

?>
<section class="section">
	<div clas="container">
		<div class="row">
        	<h3>
				Previous Posts
			</h3>
		</div>
		<?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div id="wrapper">           
                <div id="post">
                    <tr>
                        <?php
                        echo "Post by: " . $row['username'];
                        echo "<br/>";
                        echo "Title: " . $row['title'];
                        echo "<br/>";
                        echo $row['content']; //these are the fields that you have stored in your database table employee
                        echo "<br />";

                        ?>
                    </tr>
                </div>           
           
        </div>
		<?php
            echo "Tag: ";
            ?>
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
        <?php

        if($row['username'] == $_SESSION['uname']) {
            ?>
                    <input type="submit" value="Delete">
            <?php
        }
        ?>
                </form>
            </tr>

        <?php
        echo "<br/>";
        echo "<br/>";
    }
    mysqli_close($connection);
    ?>
    <a href="Login.html"><h3>Login</h3></a>
	</div>
</section>