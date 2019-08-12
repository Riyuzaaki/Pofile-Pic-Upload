<?php
session_start();
include_once 'dbh.php';
?>
<html>
<head>
<link rel="stylesheet" href="profile.css">
<title>profile pic</title>
</head>
<body>
<?php 
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $sqlimg = "SELECT * FROM profileimg WHERE userid='$id'";
            $resultimg = mysqli_query($conn,$sqlimg);
            while($rowimg = mysqli_fetch_assoc($resultimg))
            {   echo "<div class='usercontainer'>";
                    if($rowimg['status']==0)
                    {
                        $filename = "profile/profile".$id."*";
                        $fileinfo = glob($filename);
                        $fileext = explode(".", $fileinfo[0]);
                        $fileactualext = $fileext[1];
                        echo "<img src='profile/profile".$id.".". $fileactualext."?".mt_rand()."'>";
                    }
                else
                {
                    echo "<img src='profile/default.png'>";
                }
                echo "<p>".$row['username']."</p>";
                echo " </div>";
                
            }
        }
    }
    else
    {
        echo " no users";
    }
    if(isset($_SESSION['id']))
    {
        if($_SESSION['id']==1)
        {
            echo "you are loged in as user";
        }
    echo"<form action='upload.php' method='post' enctype='multipart/form-data'>
      <input type='file' name='file'>
      <button type='submit' name='submit'>Upload</button>
    </form>";
            echo"<form action='deleteprofile.php' method='post'>
      <button type='submit' name='submit'>DELETE</button>
    </form>";
    }
    else
    {
        echo "you are not logedin";
        echo "<form action='signup.php' method='post'>
        <input type='text' name='first' placeholder='firstname'>
         <input type='text' name='last' placeholder='lastname'>
         <input type='text' name='uid' placeholder='username'>
          <input type='password' name='pwd' placeholder='password'>
          <button type='submit' name='submitsignup'>signup</button>
        </form>";
    }
 ?>
<p>Login user</p>
<form action="login.php" method="post">
 <button type="submit" name="submitlogin">Login</button>
</form>
<p>Logout user</p>
<form action="logout.php" method="post">
 <button type="submit" name="submitlogout">Logout</button>
</form>


    
</body>
</html>