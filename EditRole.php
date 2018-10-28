<?php
require_once("Service.php");
$username_editRole = $_GET['username_editRole'];
$username_ses = $_GET['uname_ses'];
$_SESSION['uname'] = $username_ses;
$user = new Service();
if ($user->editRole($username_editRole))
    include "showAdminPage.php";