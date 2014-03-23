<?php
//1. Limit range
echo "mysqli<br>";
$con=mysqli_connect("localhost","root","raspberry","ua");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL:";
}

echo "querying mysql";
$result = mysqli_query($con, "SELECT * FROM u limit 1,10");//1.

while ($row = mysqli_fetch_array($result))
{
echo $row['item'];
echo $row['mean'];
echo "<br>";
}
echo "<br>end";

?>


