<!DOCTYPE html>
<html>

<head>
        <title> Hello World </title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body bgcolor ="#8AB8E6">

<table style="width:500px" align="center" bgcolor="#FFFFFF" cellpadding = "10">
<tr><td>
        <h1>Weather Station Data Graph</h1>
</td></tr>

<tr><td>
        <p align ="center">

                <a href = "index.htm">Home</a>|
                <a href = "phptest.php">Data</a>

        </p>
</td></tr>

<tr><td>
        <p>
		This is where all of the data is going to go for the graphs.
        </p>

        <p>
                Oh look! Another paragraph, that is super neat! :)
        </p>
	
	<p>
	<?php
//		require_once("/usr/share/php/jpgraph/src/jpgraph.php");
//		require_once("/usr/share/php/jpgraph/src/jpgraph_line.php");
//		echo "Start<br>";
//		$con=mysqli_connect("localhost","root","raspberry","ua");
//
//		if (mysqli_connect_errno())
//		{ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
//		
//		$result = mysqli_query($con,"SELECT * FROM u");
//		while($row = mysqli_fetch_array($result))
//		{
//			$xdata[] = $row["item"];
//			$ydata[] = $row["mean"];
//		}
//		
//		mysqli_close($con);
		
		require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

// Some data
$ydata = array(11,3,8,12,5,1,9,13,5,7);

// Create the graph. These two calls are always required
$graph = new Graph(350,250);
$graph->SetScale('textlin');

// Create the linear plot
$lineplot=new LinePlot($ydata);
$lineplot->SetColor('blue');

// Add the plot to the graph
$graph->Add($lineplot);

// Display the graph
$graph->Stroke();

	?>
	</p>
	
</td></tr>

</table>

</body>
</html>
