<?php
echo "start"
// Connecting, selecting database
$host = "localhost";
$username = "root";
$password = "raspberry";


$link = mysqli_connect ($host,$username,$password);
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysqli_select_db('ua') or die('Could not select database');

// Performing SQL query
$query = 'SELECT * FROM u';
$result = mysqli_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<table>\n";
while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>
