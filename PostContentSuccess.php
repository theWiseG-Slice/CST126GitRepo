<!--
Taco Blogs V 3.0
Login Page V 1.0
Programmers Roland, Kevin, Josh, Chuong
10/7/2018
Description:
     display all posts in html
Resources: PHP and MySQL web Development
--><?php
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("[data-toggle=tooltip]").tooltip();
    });
</script>
<html>
<head>
    <title>Taco's Blog</title>
    <link type="text/css" rel="stylesheet" href="style.css"/>
</head>
<div <!--id="wrapper"--> >
    <div <!--id="header"--> >
        <div <!--id="post"--> >
            <h2>Taco's Blog Page</h2>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <h3>Add New Post</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                    <form action="PostContentResult.php">
                        <input type="hidden" name="uname" value="<?php if(isset($_SESSION)) {echo $_SESSION['uname'];}  ?>">
                        <input text type="text" placeholder="Add Title" name="title">
                        <textarea placeholder="Add Content" name="content"></textarea>

                        <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>Add Post</button>
                    </form>
                </div><!-- Status Upload  -->
            </div><!-- Widget Area -->
        </div>

    </div>
</div>
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
<div class="container">
    <div class="row">
        <h3>Previous Posts</h3>
    </div>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div id="wrapper">
            <div id="header">
                <div id="post">
                      <b>
                      <?php echo "Title: ".$row['title'];?>
                      </b>
                      <?php
                      echo "<br/>";
                      echo $row['content'];
                      echo "<br />";
                      echo "Post by: " . $row['username'];
                      echo "<br />";
                      echo "Date: ".$row['datetime'];
                      ?>
                </div>
            </div>
        </div>
        <?php
    }
    mysqli_close($connection);
    ?>
    <a href="Login.html"><h3>Login page</h3></a><a href="index.html"><h3>Registration page</h3></a>

</div>


