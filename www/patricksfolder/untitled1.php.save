<?php // content="text/plain; charset=utf-8"
//1. going to change some of the data from ints to floats in this array.

require_once ('/usr/share/php/jpgraph/src/jpgraph.php');
require_once ('/usr/share/php/jpgraph/src/jpgraph_line.php');

// Some data
$ydata = array(1,3,8,12,5,1,9,13,5.24,7.3);//1.

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

