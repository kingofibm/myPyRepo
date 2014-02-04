<?php
header("Content-Type: text/html; charset=utf-8");
$con = mysql_connect("localhost","pi","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}


mysql_select_db("house", $con);

$days=($_REQUEST['dagar']);

$result = mysql_query("select * from housedata where date > DATE_SUB(CURDATE(),INTERVAL $days DAY)");

# $result = mysql_query("SELECT * FROM housedata WHERE date >= '2013-10-01 00:00:00'AND date <='2013-11-01 00:00:00'");

while($row = mysql_fetch_array($result)) {
       echo $row['date']."\t".$row['power']."\t".$row['temp']."\t".$row[humidity]."\t".$row[tempS2]."\t".$row['humidityS2']."\n";

}

$myFile = "/var/www/testFile.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "Floppy Jalopy\n";
fwrite($fh, $stringData);
$stringData = $days+1;
fwrite($fh, $stringData);
fclose($fh);

mysql_close($con);
?> 

