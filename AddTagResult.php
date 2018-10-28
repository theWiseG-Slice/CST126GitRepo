<?php
/**
 * Created by PhpStorm.
 * User: Chuong
 * Date: 10/3/2018
 * Time: 1:57 PM
 */
require_once("Service.php");
$username_tag = $_GET['username_tag'];
$username_ses = $_GET['username_session'];
$contentID = $_GET['contentID_tag'];
$tagName = $_GET['tagName'];
$_SESSION['uname'] = $username_ses;
$user = new Service();
if($username_ses == '')
{
    include ("Login.html");
}
else {
    if($username_ses != $username_tag &&  ($user->checkAdminRole($username_ses)==NULL))
    {
        include ("AddTagError.html");
    }
    else {
        if ($user->addTag($contentID,$tagName) == true) {
            if($user->checkAdminRole($username_ses))
                include("showAdminPage.php");
            else
                include("PostContentSuccess.php");
        } else {
            include("Login.html");
        }
    }
}
