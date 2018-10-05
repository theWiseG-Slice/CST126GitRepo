<?php
$_SESSION['uname'];
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
<div id="wrapper">
    <div id="header">
        <div id="post">
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
                        <input type="hidden" name="uname" value="<?php echo $_SESSION['uname']; ?>">
                        <textarea placeholder="Add Title" name="title"></textarea>
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
$result = mysqli_query($connection, "SELECT * FROM content");

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
                    <tr>
                        <?php
                        echo "User: " . $row['username'];
                        echo ": "; ?>
                        <b>
                        <?echo $row['title'];?>
                        </b>
                        <?php
                        echo "<br/>";
                        echo $row['content'];
                        echo "<br />";
                        ?>
                    </tr>
                </div>
            </div>
        </div>
        <?php
    }
    mysqli_close($connection);
    ?>
    <a href="Login.html"><h3>Login</h3></a>
</div>


