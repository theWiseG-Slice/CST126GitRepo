<!--
Taco Blogs V 3.0
Login Result Script V 2.0
Programmers Roland, Kevin, Josh, Chuong
9/7/2018
Description:
     Calls this to get login info from the form, then calls the script to check the database and outputs the appropriate php file
Resources: PHP and MySQL web Development, www.w3schools.com
-->
<?php

require_once("Service.php");

$uname = $_GET['uname'];
$pword = $_GET['pword'];
$_SESSION['uname'] = $uname;
$user = new Service();
if($user->login($uname, $pword)){
    include("PostContentSuccess.php");
}
else{
    include ("LoginError.php");
}
