<?php
$log = "/kippo/data/lastlog.txt"; // edit path location
$malware = "/kippo/dl/"; // edit path location
$linecount = 0;
$handle = fopen($log, "r");
while(!feof($handle)){
   $line = fgets($handle);
   $linecount++;
}
fclose($handle);
$unique = `grep -oE "\b([0-9]{1,3}\.){3}[0-9]{1,3}\b" $log | uniq | wc -l`;
echo "<b>Total Attempts:</b> $linecount<br>";
echo "<b>Unique Attempts:</b> $unique<br>";
echo "<b>Last:</b>&nbsp;";
$log = escapeshellarg($log);
$line = `tail -n 1 $log`;
$strip = array("root", "pts/0", $line);
$line = str_replace($strip, "", $line);
echo "$line<br>";
$download = `tree $malware | grep "files"`;
$dlstrip = array("0 directories,", $download);
$download = str_replace($dlstrip, "", $download);
echo "<b>Malware Downloaded:</b>&nbsp;";
echo "$download";
?>
