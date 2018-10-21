<?php

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

<div class="container">
    <div class="row">
        <h3>Add New Post</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                    <form action="PostContentResult.php">
                        <input type="hidden" name="uname" value="<?php if (isset($_SESSION)) {
                            echo $_SESSION['uname'];
                        } ?>">
                        <input type="text" placeholder="Add Title" name="title">
                        <textarea placeholder="Add Content" name="content"></textarea>
                        <button type="submit"
                        "class="btn btn-success green"><i class="fa fa-share"></i>Add Post</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</html>
<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'myblog';
$connection = mysqli_connect($host, $username, $password, $database, 8889);
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
        echo "<br/>";
        echo "<br/>";
    }
    mysqli_close($connection);
    ?>
    <a href="Login.html"><h3>Login</h3></a>
</div>



