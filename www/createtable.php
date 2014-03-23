<? php
$connect = mysqli_connect("localhost","root","raspberry");
if (!$connect){
die(mysqli_error());
}
mysqli_select_db("ua");
$results = mysqli_query("SELECT * FROM u");

while($row = mysqli_fetch_array($results))
{echo $row['mean']."</br>";
}
?>