<?php // content="text/plain; charset=utf-8"
require_once ('/usr/share/php/jpgraph/src/jpgraph.php');
require_once ('/usr/share/php/jpgraph/src/jpgraph_scatter.php');

//$datax = array(3.5,3.7,3,4,6.2,6,3.5,8,14,8,11.1,13.7);
//$datay = array(20,22,12,13,17,20,16,19,30,31,40,43);

//this one has jpgraph too
echo "mysqli<br>";
$con=mysqli_connect("localhost","root","raspberry","ua");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL:";
}

echo "querying mysql";
$result = mysqli_query($con, "SELECT * FROM u limit 0,10");

echo "declaring variables";
$datay = array();//6.
$datax = array();//6.

while ($row = mysqli_fetch_array($result))
{
$datay[] = $row['mean'];//2.
$datax[] = $row['item'];//5.

//echo "<br>";
}
/////////////////




$graph = new Graph(300,200);
$graph->SetScale("linlin");

$graph->img->SetMargin(40,40,40,40);            
$graph->SetShadow();

$graph->title->Set("A simple scatter plot");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$sp1 = new ScatterPlot($datay,$datax);

$graph->Add($sp1);
$graph->Stroke();

?>

