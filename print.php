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
width:887px;
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
<body>
<div id="content">
<center>
<div id="scroll">
<table style="margin-top:0px;">
<tr>
<td colspan="2" style="font-family:Tahoma, Geneva, sans-serif; font-size:16px; padding-bottom:10px;"><b>VOTERS LIST</b></td>
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
	$row="SELECT * FROM registered";
	$result=mysql_query($row);

echo "<table id='tbl'>
<tr>
<th width='60'>Number</th>
<th>Generated Password</th>
<th>Full Name</th>
<th>Signature</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><b>" . $row['id'] . "</b></td>";
  echo "<td><b style='color:red;'>" . $row['voters'] . "</b></td>";
  echo "<td><b style='color:red;'></b></td>";
  echo "<td><b style='color:red;'></b></td>";
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
</div>
</body>
</html>