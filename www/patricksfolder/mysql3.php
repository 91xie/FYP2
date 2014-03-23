<?php

//jp graph
//1. Include the libraries up at the top.
//2. Store the values in an array in a while loop.
//3. Copy in the code to display a graph from example0 from jpgraph examples
//4. Limit the number of outputs so hopefully it would all fit on the graph

//6. declared an array outside of the copying loop
//7. changed the library neede to jpgraph_scatter
require_once ('/usr/share/php/jpgraph/src/jpgraph.php');//1.
require_once ('/usr/share/php/jpgraph/src/jpgraph_scatter.php');//1. //7.

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
{echo $value;}


// Create the graph. These two calls are always required
//$graph = new Graph(400,400);
//$graph->SetScale("linlin");
//echo "good night";
// Create the linear plot

//$lineplot = new ScatterPlot($ydata,$xdata);
//echo "<br>lineplot = new ScatterPlot($ydata,$xdata);";
// Add the plot to the graph
//$graph->Add($lineplot);
//echo "<br> added";
// Display the graph
//$graph->Stroke();


//echo "<br>end";

?>

