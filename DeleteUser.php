<?php
require_once("Service.php");
$username_del = $_GET['user_delete'];
$username_ses = $_GET['uname_ses'];
$_SESSION['uname'] = $username_ses;

$user = new Service();
if ($user->deleteUser($username_del))
    include "showAdminPage.php";
