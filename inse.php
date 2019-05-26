<?php
$name=$_GET["name"];
$se=$_GET["se"];

$con = mysqli_connect("localhost","root","root");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"shibo");
$sql="INSERT INTO sentencelist (user_name,sentence)
VALUES
('$name','$se')";
if(!mysqli_query($con,$sql)){
    $con->close();
    echo"fail to insert";
}
else{

    $con->close();
    echo "<script type='text/javascript'>window.location.href='sentence.php?name=".$name."'</script>;";
}
?>

