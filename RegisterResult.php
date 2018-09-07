<?php
/**
 * Created by PhpStorm.
 * User: Alyssa
 * Date: 9/7/2018
 * Time: 9:52 AM
 */
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