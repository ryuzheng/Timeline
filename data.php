<?php
$con = mysql_connect("localhost","root","");//主机名、数据库用户名、密码

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("timeline", $con);//数据库名
mysql_query ( "set names utf8" );

$result = mysql_query("SELECT * FROM timeline");

$rows = array();

while ($r = mysql_fetch_assoc($result)) {
	$row = array();
	$row['title'] = $r['title'];
	$row['date'] = $r['date'];
	$row['display_date'] = $r['display_date'];
	$row['photo_url'] = $r['photo_url'];
	$row['caption'] = $r['caption'];
	$row['body'] = $r['body'];
	$row['read_more'] = $r['read_more'];
	
	array_push($rows,$row);
}
print json_encode($rows);
mysql_close($con );
?>