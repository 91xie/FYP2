<?php
echo"hello1";
mysqli_connect("localhost","root","raspberry","ua") or die(mysql_error());

if (mysqli_connect_errno())
{
echo"failed".mysqli_connect_error();
}
echo"hello";
?>