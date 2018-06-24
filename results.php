<?php
	require_once('admin-auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="SHORTCUT ICON" href="images/log.png">
<title>Student Voting System</title>
<style>
#tbl
{
font-family:Tahoma, Geneva, sans-serif;
border-collapse:collapse;
margin-bottom:20px;
width:885px;
}
#tbl td, #tbl th
{
font-size:11px;
border:1px solid #004e49;
padding:3px 7px 2px 7px;
background-color:#ffffff;
color:#4b4b4b;
font-family:Tahoma, Geneva, sans-serif;
}
#tbl th
{
font-size:14px;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#004e49;
color:#ffffff;
}
</style>
</head>
<body style="background-color:green">
<div id="bar">

<div style="width:900px; margin:auto; padding-top:8px;">
<img src="images/aclc-logo.png" /><marquee scrolldelay="1" scrollamount="3" direction="left" width="700"><font color='yellow' style='font-family:arial'><b>HIGHEST VOTE HAVE CANDIDATES WON THE ELECTION</font></marquee>
</div>
</div>
<div id="subbar">
<table style="padding-top:80px; width:885px; margin:auto; text-align:right;">
<tr>
<td id="bold" style="color:#FFF; padding-left:10px;">
<a href="generating.php">Election Results</a> | <a href="addcand.php">Add Election Candidates</a> | <a href="admin-logout.php">Logout</a>

</td>
</tr>
</table>
</div>
<div id="content">
<center>
<div id="scroll">
<table style="margin-top:0px;">
<tr>
<td style="font-family:Tahoma, Geneva, sans-serif; font-size:16px; padding-bottom:10px;"><b>ELECTION RESULTS</b></td>
<td style="font-family:Tahoma, Geneva, sans-serif; font-size:16px; padding-bottom:10px;"></td>
</tr>
<tr>
<td colspan="2">
<?php
	//databse connection
	include_once 'config.php';

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	//Create query
	$row="SELECT DISTINCT `president`,COUNT(*) as total FROM votes GROUP BY `president` ORDER BY `total` DESC";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='200'>RUNNING PRESIDENTS</th>
<th>TOTAL OF VOTES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td style='background-color:#096660; color:#fff;'><b>" . $row['president'] . "</b></td>";
  echo "<td><b>" . $row['total'] . "</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($link);
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php
	//databse connection
	include_once 'config.php';

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	//Create query
	$row="SELECT DISTINCT `invp`,COUNT(*) as total FROM votes GROUP BY `invp` ORDER BY `total` DESC";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='200'>INTERNAL PRESIDENTS</th>
<th>TOTAL OF VOTES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td style='background-color:#096660; color:#fff;'><b>" . $row['invp'] . "</b></td>";
  echo "<td><b>" . $row['total'] . "</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($link);
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php
	//databse connection
	include_once 'config.php';

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	//Create query
	$row="SELECT DISTINCT `exvp`,COUNT(*) as total FROM votes GROUP BY `exvp` ORDER BY `total` DESC";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='200'>EXTERNAL PRESIDENTS</th>
<th>TOTAL OF VOTES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td style='background-color:#096660; color:#fff;'><b>" . $row['exvp'] . "</b></td>";
  echo "<td><b>" . $row['total'] . "</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($link);
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php
	//databse connection
	include_once 'config.php';

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	//Create query
	$row="SELECT DISTINCT `secretary`,COUNT(*) as total FROM votes GROUP BY `secretary` ORDER BY `total` DESC";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='200'>SECRETARY</th>
<th>TOTAL OF VOTES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td style='background-color:#096660; color:#fff;'><b>" . $row['secretary'] . "</b></td>";
  echo "<td><b>" . $row['total'] . "</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($link);
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php
	//databse connection
	include_once 'config.php';

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	//Create query
	$row="SELECT DISTINCT `treasurer`,COUNT(*) as total FROM votes GROUP BY `treasurer` ORDER BY `total` DESC";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='200'>TREASURER</th>
<th>TOTAL OF VOTES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td style='background-color:#096660; color:#fff;'><b>" . $row['treasurer'] . "</b></td>";
  echo "<td><b>" . $row['total'] . "</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($link);
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php
	//databse connection
	include_once 'config.php';

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	//Create query
	$row="SELECT DISTINCT `auditor`,COUNT(*) as total FROM votes GROUP BY `auditor` ORDER BY `total` DESC";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='200'>AUDITOR</th>
<th>TOTAL OF VOTES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td style='background-color:#096660; color:#fff;'><b>" . $row['auditor'] . "</b></td>";
  echo "<td><b>" . $row['total'] . "</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($link);
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php
	//databse connection
	include_once 'config.php';

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	//Create query
	$row="SELECT `fone`, SUM(`total`) AS `total` FROM
(
SELECT DISTINCT `fone`, COUNT(*) as `total` FROM `votes` GROUP BY `fone`
UNION ALL
SELECT DISTINCT `ftwo`, COUNT(*) as `total` FROM `votes` GROUP BY `ftwo`
) AS u
GROUP BY `fone` ORDER BY `total` DESC";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='200'>FIRST YEAR REP</th>
<th>TOTAL OF VOTES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td style='background-color:#096660; color:#fff;'><b>" . $row['fone'] . "</b></td>";
  echo "<td><b>" . $row['total'] . "</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($link);
?>
</td>
</tr>
<tr>
<td colspan="2">
<?php
	//databse connection
	include_once 'config.php';

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	//Create query
	$row="SELECT `sone`, SUM(`total`) AS `total` FROM
(
SELECT DISTINCT `sone`, COUNT(*) as `total` FROM `votes` GROUP BY `sone`
UNION ALL
SELECT DISTINCT `stwo`, COUNT(*) as `total` FROM `votes` GROUP BY `stwo`
) AS u
GROUP BY `sone` ORDER BY `total` DESC";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='200'>SECOND YEAR REP</th>
<th>TOTAL OF VOTES</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td style='background-color:#096660; color:#fff;'><b>" . $row['sone'] . "</b></td>";
  echo "<td><b>" . $row['total'] . "</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($link);
?>
</td>
</tr>

</table>
</div>
</center>
</div>
<div id="footer">
ONLINE VOTING SYSTEM BCET,DURG 2016
</div>
</body>
</html>