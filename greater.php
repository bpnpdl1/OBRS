<?php 
$t1="";
$t2="";
$result="";

if(isset($_GET["txtresult"]))
{
    $t1=$_GET["txt1"];
    $t2=$_GET["txt2"];
    if($t1>$t2)
    {
        $result=$t1;
    }
    else{
        $result=$t2;
    }
}
?>

<html>
<head>
    <title>Greater num</title>
</head>
<body>
    <form action="greater.php" method="get">
        Input First number <input type="text" name="txt1" value="<?php echo $t1 ?>"><br>
        Input Second number <input type="text" name="txt2" value="<?php echo $t2?>"><br>
        <input type="submit" value="check" name="btncheck"><br>
        Greater Number is <input type="text" name="txtresult" value="<?php echo $result ?>">
    </form>
</body>
</html>