
<h3>Search Result</h3>
<?php
/**
 * Created by PhpStorm.
 * User: Chuong
 * Date: 10/3/2018
 * Time: 1:57 PM
 */
$username = $_GET['uname1'];
$tagName = $_GET['tag'];
$_SESSION['uname'] = $username;
$host = 'us-cdbr-iron-east-01.cleardb.net';
$username = 'b808da256c0eda';
$password = '6a7d3dc1';
$database = 'heroku_97591c0989c66a5';
$connection = mysqli_connect($host, $username, $password, $database);
$result = mysqli_query($connection, "SELECT tagID FROM tags WHERE tagName='$tagName'");
if ($result->num_rows > 0) {
    $tagID = mysqli_fetch_array($result)['tagID'];
    $result1 = mysqli_query($connection, "SELECT contentID FROM tags_content WHERE tagID='$tagID'");
    if ($result1->num_rows > 0) {
        while ($row1 = mysqli_fetch_array($result1)) {
            $contentID = $row1['contentID'];
            $result3 = mysqli_query($connection, "SELECT * FROM content WHERE contentID='$contentID'");
            while ($row3 = $result3->fetch_assoc()) {
                ?>
                <div style="background-color:lightblue">
                    <?php
                    echo "" . $row3['title'];
                    echo "</br>";
                    echo "" . $row3['content'];
                    echo "</br>";
                    echo "" . $row3['author'];
                    ?>
                    </div>
                <?php

                echo "</br>";
                echo "</br>";
                echo "</br>";

                    ?>

                <?php
            }
        }
    }
} else {
    echo "No Search match with this tag";
}
?>

<a href="PostContentSuccess.php">Go back</a>
