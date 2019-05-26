<?php
$con = new mysqli("localhost","root","root","shibo");
if (mysqli_connect_errno($con))
{
    echo "error" . mysqli_connect_error();
}
$sql="select * from student";
$result=$con->query($sql);
$row=$result->fetch_all(MYSQLI_BOTH);
$n=0;
if(mysqli_num_rows($result)==0){
    echo"no student";
}
else {
    while ($n < mysqli_num_rows($result)) {
        echo $row[$n]["name"] . "<br/>";
        $n++;
    }
}
?>
