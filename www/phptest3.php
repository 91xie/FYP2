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
require_once("/usr/share/php/jpgraph/src/jpgraph.php");
require_once("/usr/share/php/jpgraph/src/jpgraph_line.php");
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




// Create the graph and specify the scale for both Y-axis
$graph = new Graph(1015,550,"auto");
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