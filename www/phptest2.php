<?php // content="text/plain; charset=utf-8"
require_once ('/usr/share/php/jpgraph/src/jpgraph.php');
require_once ('/usr/share/php/jpgraph/src/jpgraph_line.php');

// Some data
//$ydata = array(11,3,8,12,5,1,9,13,5,7);

// Create the graph. These two calls are always required
//$graph = new Graph(350,250);
//$graph->SetScale('textlin');

// Create the linear plot
//$lineplot=new LinePlot($ydata);
//$lineplot->SetColor('blue');

// Add the plot to the graph
//$graph->Add($lineplot);

// Display the graph
//$graph->Stroke();
$host = "localhost";
$username = "root";
$password = "raspberry";


$connection = mysql_connect ($host,$username,$password);
if(!$connection){
die('Not connected : ' .mysql_error());
}
 //set the database
$db_selected = mysql_select_db($database,$connection);
if (!$db_seleced {

die ('Can\'t use db : ' .mysql_error());
}

$query = " SELECT item,mean from ua";
$result = mysql_query($query);
//All good
if (!$result){
//Nope
$message = 'Invalid query:'.mysql_error()."\n";
$message.='Whole query:'.$query;
die($message);

}
if (myrow=mysql_fetch_array($result)){
do
{
$data[] = $myrow["mean"];
$item[]=$myrow["item"];
}
while($myrow=mysql_fetch_array($result));
}


/*

// Create the graph and specify the scale for both Y-axis
$graph = new Graph(1015,550,"auto");
$lineplot->SetColor('blue');

// Add the plot to the graph
$graph->Add($lineplot);

// Display the graph
$graph->Stroke();
?>


