<!--
Taco Blogs V 3.0
Login Page V 1.0
Programmers Roland, Kevin, Josh, Chuong
10/7/2018
Description:
     displays proper php on post and gives documents to database
Resources: PHP and MySQL web Development
--><?php
/**
 * Created by PhpStorm.
 * User: Chuong
 * Date: 10/3/2018
 * Time: 1:57 PM
 */
require_once("Service.php");
$username = $_GET['uname'];
$content = $_GET['content'];
$title = $_GET['title'];
$_SESSION['uname'] = $username;

$user = new Service();
if($username == '')
{
    include ("RequireLogin.php");
}
else {
    if ($user->insertPost($username, $title, $content) == true) {
          if($user->checkAdminRole($username))
                include("showAdminPage.php");
          else
               include("PostContentSuccess.php");
    } else {

        include("PostContentError.php");
    }
}
