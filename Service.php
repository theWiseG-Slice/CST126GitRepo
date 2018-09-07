<?php
/**
 * Created by PhpStorm.
 * User: Alyssa
 * Date: 9/6/2018
 * Time: 5:54 PM
 */

class Service{

    private  $host = 'localhost';
    private  $username = 'root';
    private  $password = 'root';
    private  $database = 'try1';

    function login($username, $password){
        $connection = mysqli_connect($this->host, $this->username,$this->password,$this->database);
        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
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
        $sql = "INSERT INTO users (username,password,firstname,lastname,email) VALUES ('$uname','$pword','$firstname','$lastname','$email')";
        $result = $connection->query($sql) or die(mysqli_error($connection));
        return true;
    }
}