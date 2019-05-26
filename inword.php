<?php
$name=$_GET["name"];
$en=$_GET["en"];
$ch=$_GET["ch"];

$con = mysqli_connect("localhost","root","root");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"shibo");
$sql="INSERT INTO wordlist (user_name,en,ch)
VALUES
('$name','$en','$ch')";
if(!mysqli_query($con,$sql)){
    $con->close();
    echo"fail to insert";
}
else{
    $procedure="CALL updatenum('".$name."');";
    $con->query($procedure);
    $con->close();
    echo "<script type='text/javascript'>window.location.href='word.php?name=".$name."'</script>;";
}
?>
