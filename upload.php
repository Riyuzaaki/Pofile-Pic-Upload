<?php
session_start();
include_once 'dbh.php';
$id = $_SESSION['id'];
if(isset($_POST['submit']))
{
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filetype =  $_FILES['file']['type'];
    $filetemp =  $_FILES['file']['tmp_name'];
    $fileerror =  $_FILES['file']['error'];
    $filesize =  $_FILES['file']['size'];
    $fileext = explode('.',$filename);
    $fileactualext = strtolower(end($fileext));
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileactualext,$allowed))
    { if($fileerror === 0)
        { 
            if($filesize <= 1000000)
            {
              $filenewname = "profile".$id.".".$fileactualext;
                $filedestination = 'profile/'.$filenewname;
                move_uploaded_file($filetemp,$filedestination);
                $sql = "UPDATE profileimg SET status=0 WHERE userid='$id';";
                $result = mysqli_query($conn,$sql);
                header("Location: profile.php?uploaded");
            } 
            else
            {
                echo "too big";
            }
        }
     else
     {
         echo "error uploading";
     }
        
    }
    else
    {
        echo "invalid format";
    }
   
}
else
{
    header("Location: index.php?error");
}





?>