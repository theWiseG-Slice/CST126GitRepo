<?php
/**
 * Created by PhpStorm.
 * User: Chuong
 * Date: 10/3/2018
 * Time: 1:57 PM
 */
require_once("Service.php");
$username_del = $_GET['uname_del'];
$username_ses = $_GET['uname_ses'];
$content = $_GET['content_del'];
$title = $_GET['title_del'];
$contentID=$_GET['contentID_del'];
$_SESSION['uname'] = $username_ses;

$user = new Service();
if($username_ses == '')
{
    include ("DeleteError.html");
}
else {
    if($username_ses != $username_del &&  ($user->checkAdminRole($username_ses)==NULL))
    {
        include ("DeleteError.html");
    }
    else {
        if ($user->deletePost($contentID) == true) {
            if($user->checkAdminRole($username_ses))
                include("showAdminPage.php");
            else
                include("PostContentSuccess.php");
        } else {

            include("DeleteError.html");
        }
    }
}
