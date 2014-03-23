<?php
echo "mysqli";
$con=mysqli_connect("localhost","root","raspberry","ua");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM u");

while($row = mysqli_fetch_array($result))
  {
  echo $row['mean'];
  echo "<br>";
  }

mysqli_close($con);
?>

