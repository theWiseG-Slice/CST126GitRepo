<?php
/**
 * Created by PhpStorm.
 * User: Alyssa
 * Date: 9/7/2018
 * Time: 2:22 AM
 */
require_once("Service.php");

$uname = $_GET['uname'];
$pword = $_GET['pword'];
$user = new Service();
if($user->login($uname, $pword)){
    include("LoginSuccess.php");
}
else{
    include ("LoginError.php");
}