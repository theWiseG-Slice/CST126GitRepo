<!--
Taco Blogs V 3.0
Service Class V 1.0
Programmers Roland, Kevin, Josh, Chuong
10/7/2018
Description:
     PHP class that runs all the mysql backend involving in writing to the database and fetching loin info from the database
Resources: PHP and MySQL web Development, www.w3schools.com
-->
<?php

class Service{

    private  $host = 'us-cdbr-iron-east-01.cleardb.net';
    private  $username = 'b808da256c0eda';
    private  $password = '6a7d3dc1';
    private  $database = 'heroku_97591c0989c66a5';

    function login($username, $password){
        $connection = mysqli_connect($this->host, $this->username,$this->password,$this->database);
        $sql = "SELECT * FROM users WHERE username = '$username' and pword = '$password'";
        $result = mysqli_query($connection,$sql);
        if($result) {
            $count = $result->num_rows;
            if ($count > 0) {
                return true;
            }
            else
                return false;
        }
        else
            return false;
    }
    function register($uname,$pword,$firstname,$lastname,$email)
    {
        $connection = mysqli_connect($this->host, $this->username,$this->password,$this->database);
        $sql = "INSERT INTO users (username,pword,firstname,lastname,email) VALUES ('$uname','$pword','$firstname','$lastname','$email')";
        //$result = $connection->query($sql) or die(mysqli_error($connection));
        //return true;
         if($connection->query($sql) == true)
              return true;
         else
              return false;
    }
     function insertPost($usersession, $title, $content)
    {
        $connection = mysqli_connect($this->host, $this->username,$this->password,$this->database);
        $sql = "INSERT INTO content(username, title, content) VALUES('$usersession', '$title','$content')";
        if($connection->query($sql) ==true)
            return true;
        else
            return false;

    }
     function deletePost($contentID)
    {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        $sql = "DELETE FROM  content WHERE contentID = '$contentID'";
        $sql1 = "DELETE FROM tags_content WHERE contentID = '$contentID'";
        if($connection->query($sql) && $connection->query($sql1) )
            return true;
        else
            return false;
    }
    function addTag($contentID,$tagName)
    {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        $result = mysqli_query($connection, "SELECT tagName FROM tags WHERE tagName='$tagName'");
        if (mysqli_num_rows($result) == 0) {
            $sql2 = "INSERT INTO tags (tagName) VALUES ('$tagName')";
            $connection->query($sql2);
        }
        $tagID = mysqli_fetch_array(mysqli_query($connection, "SELECT tagID FROM tags WHERE tagName = '$tagName'"))[0];
        $sql3="SELECT * FROM tags_content WHERE tagId = '$tagID'";
        $result3 = mysqli_query($connection,$sql3);
        if(mysqli_num_rows($result3) > 0)
        {
            while ($row = mysqli_fetch_array($result3)){
                if($row['contentID']==$contentID)
                    return false;
            }
        }
        $sql1 = "INSERT INTO tags_content (tagID,contentID) VALUES ('$tagID','$contentID')";
        if ($connection->query($sql1))
            return true;
        else
            return false;
    }
}
