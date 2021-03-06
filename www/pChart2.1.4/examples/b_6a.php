<?php   
 /* CAT:Line chart */

$con=mysqli_connect("localhost","root","raspberry","ws");

$result = mysqli_query($con, " SELECT * FROM (SELECT * FROM v ORDER BY item DESC LIMIT 10)sub ORDER BY item ASC");//1.

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
 $MyData->setAxisName(0,"v [m/s]");
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
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>11));
 $myPicture->drawText(150,35,"v [m/s]",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

 /* Set the default font */
 $myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));

 /* Define the chart area */
 $myPicture->setGraphArea(60,40,650,200);

 /* Draw the scale */
 $scaleSettings = array("XMargin"=>10,"YMargin"=>10,"Floating"=>TRUE,"GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
 $myPicture->drawScale($scaleSettings);

 /* Turn on Antialiasing */
 $myPicture->Antialias = TRUE;

 /* Draw the line chart */
 $myPicture->drawLineChart();

 /* Write the chart legend */
 $myPicture->drawLegend(540,20,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.drawLineChart.simple.png");
?>

