<!--
Taco Blogs V 2.0
Registration Result Script V 1.0
Programmers Roland, Kevin, Josh, Chuong
9/7/2018
Description:
     Script called to add registration information to the database. calls on service.php to run the function in that class
Resources: PHP and MySQL web Development, www.w3schools.com
-->
<?php
require_once("Service.php");

$uname = $_GET['uname'];
$pword = $_GET['pword'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];

$user = new Service();
if($user->register($uname,$pword,$firstname,$lastname,$email)){
    include("RegisterSuccess.php");
}
else{
    include ("RegisterError.php");
}
