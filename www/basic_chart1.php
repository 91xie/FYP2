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
$con=mysqli_connect("localhost","root","raspberry","ua");
if (mysqli_connect_errno())
{
echo "failed" . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM t");
$xdata = array();
$ydata = array();
while($row = mysqli_fetch_array($result))
{
echo $row['mean'];
$xdata[] = $row['mean'];
$ydata[] = $row['item'];
}


$pc = new C_PhpChartX(array($ydata,$xdata),'basic_chart');
$pc->draw();
?>

</body>
</html>