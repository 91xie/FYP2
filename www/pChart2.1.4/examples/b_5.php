<!DOCTYPE html>
<html>

<head>
        <title> Hello World </title>
//        <link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body bgcolor ="#8AB8E6">

<table style="width:800px" align="center" bgcolor="#FFFFFF" cellpadding = "10">
<tr><td>
        <h1>Hello World</h1>
</td></tr>

<tr><td>
        <p align ="center">

                <a href = "index.htm">Home</a>|
                <a href = "phptest.php">PHP</a>

        </p>
</td></tr>

<tr><td>
        <p>
                This is where lots of text is going to go.
                The contents of this is going to be great
        </p>

        <p>
                Oh look! Another paragraph, that is super neat! :)
        </p>
	
	<?php   
 /* CAT:Line chart */

$con=mysqli_connect("localhost","root","raspberry","ua");

$result = mysqli_query($con, "SELECT * FROM u ORDER BY item DESC LIMIT 10");//1.

 /* pChart library inclusions */
 include("../class/pData.class.php");
 include("../class/pDraw.class.php");
 include("../class/pImage.class.php");

 /* Create and populate the pData object */
 $MyData = new pData();  

while ($row = mysqli_fetch_array($result))
{
 $MyData->addPoints($row['mean'],"mean");
 $MyData->addPoints($row['max'],"max");
 $MyData->addPoints($row['min'],"min");
 $date = date_create($row['date_entered']);

// $MyData->addPoints($row['date_entered'],"Labels");
 $MyData->addPoints(date_format($date,'H:i:s'),"Labels");
}
 $MyData->setSerieTicks("max",4);
 $MyData->setSerieWeight("min",2);
 $MyData->setAxisName(0,"u [m/s]");
// $MyData->addPoints(array("Jan","Feb","Mar","Apr","May","Jun"),"Labels");
 $MyData->setSerieDescription("Labels","Time");
 $MyData->setAbscissa("Labels");


 /* Create the pChart object */
 $myPicture = new pImage(700,230,$MyData);

 /* Turn of Antialiasing */
 $myPicture->Antialias = FALSE;

 /* Add a border to the picture */
// $myPicture->drawRectangle(0,0,699,298,array("R"=>0,"G"=>0,"B"=>0));
 
 /* Write the chart title */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize$
 $myPicture->drawText(150,35,"u [m/s]",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BO$

 /* Set the default font */
 $myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","Font$

 /* Define the chart area */
 $myPicture->setGraphArea(60,40,650,200);

 /* Draw the scale */
 $scaleSettings = array("XMargin"=>10,"YMargin"=>10,"Floating"=>TRUE,"GridR"=>200,$
 $myPicture->drawScale($scaleSettings);

/* Turn on Antialiasing */
 $myPicture->Antialias = TRUE;

 /* Draw the line chart */
 $myPicture->drawLineChart();

 /* Write the chart legend */
 $myPicture->drawLegend(540,20,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZ$

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.drawLineChart.simple.png");
?>


</td></tr>

</table>

</body>
</html>

