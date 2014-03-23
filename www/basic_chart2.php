<?php
require_once("/var/www/pChart2.1.4/class/pData.class.php");
require_once("/var/www/pChart2.1.4/class/pDraw.class.php");
require_once("/var/www/pChart2.1.4/class/pImage.class.php");


/* Create your dataset object */
$myData = new pData(); 
 
$db = mysql_connect("localhost", "root", "raspberry"); //location of server, db username, db pass
mysql_select_db("ua", $db);
 
$Requete = "SELECT * FROM 'u'"; //table name
$Result = mysql_query($Requete, $db);
 
/*This fetches the data from the mysql database, and adds it to pchart as points*/
while($row = mysql_fetch_array($Result))
{
    //$Sample_Number = $row["Sample_Number"]; //Not using this data
    //$myData->addPoints($Sample_Number,"Sample_Number");
     
    $time = $row["item"];
    $myData->addPoints($Time,"Time");
     
    $mean = $row["mean"];
    $myData->addPoints($mean,"mean");
     
   
}
 
$myData-> setSerieOnAxis("mean", 0); //assigns the data to the frist axis
$myData-> setAxisName(0, "Temperature"); //adds the label to the first axis
 
$myData-> setSerieOnAxis("mean", 1);
$myData-> setAxisName(1, "LDR");
 
$myData-> setAxisPosition(1,AXIS_POSITION_LEFT); //moves the second axis to the far left
 
$myData->setAbscissa("Time"); //sets the time data set as the x axis label
 
 
$myPicture = new pImage(1100,300,$myData); /* Create a pChart object and associate your dataset */
 
$myPicture->setFontProperties(array("FontName"=>"/var/www/pChart2.1.4/fonts/pf_arma_five.ttf","FontSize"=>6)); /* Choose a nice font */
 
$myPicture->setGraphArea(80,40,1000,200); /* Define the boundaries of the graph area */
 
$Settings = array("R"=>250, "G"=>250, "B"=>250, "Dash"=>1, "DashR"=>0, "DashG"=>0, "DashB"=>0);
 
$myPicture->drawScale(array("LabelRotation"=>320)); /* Draw the scale, keep everything automatic */
 
/*The combination makes a cool looking graph*/
$myPicture->drawPlotChart();
$myPicture->drawLineChart();
 
 
$myPicture->drawLegend(90,20); //adds the legend

$myPicture->autoOutput();
$
?>

</body>
</html>