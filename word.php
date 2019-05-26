<?php
$name=$_GET["name"];
$con = new mysqli("localhost","root","root","shibo");
if (mysqli_connect_errno($con))
{
    echo "error" . mysqli_connect_error();
}
$sqlstr="select en,ch from wordlist where user_name='$name'";
$sqlstr1="SELECT num FROM wordnumber where user_name='$name'";
$result=$con->query($sqlstr);
$row=$result->fetch_all(MYSQLI_BOTH);
$n=0;
if(mysqli_num_rows($result)==0){
   echo"no word";
}
else {
    while ($n < mysqli_num_rows($result)) {
        echo "word:" . $row[$n]["en"] . "   meaning：" . $row[$n]["ch"] . "<br/>";
        $n++;
    }
    $result1 = $con->query($sqlstr1);
    $row = $result1->fetch_assoc();
    echo "wordnumber is " . $row["num"];
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

    function inword(){
        var name=getQueryVariable("name");
        var en=document.getElementById("en").value;
        var ch=document.getElementById("ch").value;
        //console.log(name, en, ch);
        window.location.href=`inword.php?name=${name}&en=${en}&ch=${ch}`;
    }
</script>
<form>
    word:<input type="text" name="en" id="en"/><br>
    mean:<input type="text" name="cn" id="ch"/><br>
    <input type="button" value="submit" onclick="inword()"/>
</form>
</html>
