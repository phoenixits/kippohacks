<?php
$log = "/kippo/data/lastlog.txt"; // modify this to your system
$linecount = 0;
$handle = fopen($log, "r");
while(!feof($handle)){
   $line = fgets($handle);
   $linecount++;
}
fclose($handle);
echo "<b>Hacking Attempts:</b> $linecount<br>";
echo "<b>Last:</b>&nbsp;";
$log = escapeshellarg($log);
$line = `tail -n 1 $log`;
$strip = array("root", "pts/0", $line);
$line = str_replace($strip, "", $line);
echo "$line";
?>
