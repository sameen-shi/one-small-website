<?php
$name=$_POST["name"];
$code=$_POST["code"];
$con = mysqli_connect("localhost","root","root");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"shibo");
$sqlstr="select * from user where name='$name' and code='$code'";
$result = $con->query($sqlstr);
if($result->num_rows>0){
    $con->close();
    echo "<script type='text/javascript'>window.location.href='list.html?name=".$name."'</script>;";
} else{
    $con->close();
    echo"wrong input";
}