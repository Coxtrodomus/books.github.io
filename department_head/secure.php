<?php
session_start(); //creates a session from the login page and maintains this session across all pages within admin folder
if(!isset($_SESSION['department_head'])) //if the user accessing any of these pages does not have an admin roll, will be redirected back to login
{
    echo '<script type="text/javascript"> window.open("http://bookinterchange.atwebpages.com/login.php","_self");</script>';
}

?>