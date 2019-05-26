<?php
$name=$_GET["name"];
$sqlstr="DELETE FROM user WHERE name = '$name'";
$con = new mysqli("localhost","root","root","shibo");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
$result=$con->query($sqlstr);
if($result){
    $con->close();
    echo"log out successfully";
}
else{
    $con->close();
    echo"fail to log out";
}
?>
