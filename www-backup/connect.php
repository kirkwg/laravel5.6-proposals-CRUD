<?php
echo "Connect starting...<br>\n";
$dbname = 'mysql';
$dbhost = '192.168.33.10';
$dbuser = 'sqluser';
$dbpass = 'sqlpassword';


$link = mysqli_connect($dbhost, $dbuser, $dbpass) or 
        die("**Unable to connect to to '$dbhost' ");
 mysqli_select_db($link, $dbname) or 
        die("**Could not open the DB '$dbname'");		

$test_query = "SHOW TABLES FROM $dbname"		;
$result = mysqli_query($link, $test_query);
$tblCnt = 0;

while ($tbl = mysqli_fetch_array($result)) {
	$tblCnt++;	
}
if (!$tblCnt) {
  echo "There are no tables<br>\n";
} else {
  echo "There are $tblCnt tables<br>\n";
} 


?>