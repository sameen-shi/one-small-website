<?php
$name=$_GET["name"];
$con = new mysqli("localhost","root","root","shibo");
if (mysqli_connect_errno($con))
{
    echo "error" . mysqli_connect_error();
}
$sqlstr="select sentence from sentencelist where user_name='$name'";
$result=$con->query($sqlstr);
$row=$result->fetch_all(MYSQLI_BOTH);
$n=0;
if(mysqli_num_rows($result)==0){
    echo"no sentence";
}
else {
    while ($n < mysqli_num_rows($result)) {
        echo $row[$n]["sentence"] . "<br/>";
        $n++;
    }


}
$con->close();
?>
<html>
<script>
    function getQueryVariable(variable)
    {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){return pair[1];}
        }
        return(false);
    }

    function inse(){
        var name=getQueryVariable("name");
        var se=document.getElementById("se").value;
        window.location.href=`inse.php?name=${name}&se=${se}`;
    }
</script>
<form>
    sentence:<input type="text" name="se" id="se"/><br>
    <input type="button" value="submit" onclick="inse()"/>
</form>
</html>

