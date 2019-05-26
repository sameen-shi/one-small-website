<?php
$name=$_POST['name'];
$code=$_POST['code'];
$student=$_POST['student'];
$con = mysqli_connect("localhost","root","root");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"shibo");
$sql="INSERT INTO user (name, code, is_student)
VALUES
('$name','$code','$student')";
$sql1="INSERT INTO wordnumber (user_name,num)
VALUES
('$name',0)";
if (!mysqli_query($con,$sql))
{
    die('Error: ' . mysqli_error($con));
}
else{
    mysqli_query($con,$sql1);
    $con->close();
    ?><html><a href="login.html">return to login in</a></html><?php
}
?>

