<?php
require_once("/var/www/phpChart_Lite/conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Basic Chart</title>
</head>
<body>

<?php
//this one has jpgraph too
echo "mysqli<br>";
$con=mysqli_connect("localhost","root","raspberry","ua");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL:";
}

echo "querying mysql";
$result = mysqli_query($con, "SELECT * FROM t limit 0,10");

echo "declaring variables";
$ydata = array();//6.
$xdata = array();//6.

while ($row = mysqli_fetch_array($result))
{
$ydata[] = $row['mean'];//2.
$xdata[] = $row['item'];//5.

//echo "<br>";
}
echo "<br> copy over successful";

foreach($ydata as &$value)
{echo "<br>";echo $value;}


?>
<p>
hello!
</p>

    
<?php
$pc = new C_PhpChartX(array($ydata,$xdata),'basic_chart');
$pc->draw();
?>

</body>
</html>



