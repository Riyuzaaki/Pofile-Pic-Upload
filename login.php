<?php
session_start();

if(isset($_POST['submitlogin']))
{
    $_SESSION['id'] = 3;
    header("Location: profile.php");
}