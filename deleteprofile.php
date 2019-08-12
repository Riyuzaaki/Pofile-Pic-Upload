<?php

session_start();
include_once 'dbh.php';

$sessionid = $_SESSION['id'];
$filename = "profile/profile".$sessionid."*";
$fileinfo = glob($filename);
$fileext = explode(".", $fileinfo[0]);
$fileactualext = $fileext[1];
$file = "profile/profile".$sessionid.".".$fileactualext;

if(!unlink($file))
{
    echo "error";
}
else
{   
    echo "sucess";
}

$sql = "UPDATE profileimg SET status=1 WHERE userid='$sessionid';";
mysqli_query($conn, $sql);
header("Location: profile.php?profileimgdeleted");

