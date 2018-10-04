<?php
/**
 * Created by PhpStorm.
 * User: Chuong
 * Date: 10/3/2018
 * Time: 1:57 PM
 */
require_once("Service.php");
$username = $_GET['uname'];
$comment = $_GET['comment'];
$_SESSION['uname'] = $username;
$user = new Service();
if($user->insertComment($username,$comment)==true){
    include("PostContentSuccess.php");
}
else{
    include ("LoginSuccess.php");
}