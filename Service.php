<!--
Taco Blogs V 2.0
Service Class V 1.0
Programmers Roland, Kevin, Josh, Chuong
9/7/2018
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
        $result = $connection->query($sql) or die(mysqli_error($connection));
        return true;
    }
}
