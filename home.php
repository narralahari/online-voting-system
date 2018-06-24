<?php
	include('conn.php');

	session_start();
	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="SHORTCUT ICON" href="images/log.png">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/user_style.css" />
</head>

<body style="background-color:green">

<div id="main">
	<div id="header">
		<div id="logo"><marquee><font color="yellow">PLEASE VOTE WHITHOUT ANY PRESSURE</font></marquee> </div>
		<div id="right_head">
			<p class="right">
			<?php
			$sel="SELECT * FROM login WHERE email='".$_SESSION['email']."'";
			$res=mysql_query($sel);
			$fet=mysql_fetch_array($res);
			echo $fet['email'];
			?> | <a href="logout.php">Logout</a></p>
		</div>
	</div>
	<div id="container">
		<div id="sidebar">
			<?php include 'sidebar.php'; ?>
		</div>


<div id="content">
<center>
<div id="scroll">
<?php
	if(isset($_SESSION['ALREADY'])){
	echo '<div style="background-color:#ffebe8; border:1px solid #dd3c10; padding:5px; color:#000; border-radius: 0px; font-family:tahoma; font-size:12px; margin-right:10px;">';
	echo $_SESSION['ALREADY'];
	unset($_SESSION['ALREADY']);
	echo '</div>';
}?>
<?php
	if(isset($_SESSION['SAVED'])){
	echo '<div style="background-color:#abd46e; border:1px solid #518413; padding:5px; color:#000; border-radius: 0px; font-family:tahoma; font-size:12px;margin-right:10px;">';
	echo $_SESSION['SAVED'];
	unset($_SESSION['SAVED']);
	echo '</div>';
}?>
<?php
	if(isset($_SESSION['DUPLICATE'])){
	echo '<div style="background-color:#ffebe8; border:1px solid #dd3c10; padding:5px; color:#000; border-radius: 0px; font-family:tahoma; font-size:12px; margin-right:10px;">';
	echo $_SESSION['DUPLICATE'];
	unset($_SESSION['DUPLICATE']);
	echo '</div>';
}?>


<center>

<?php
  require'db_conn.php';
?>
<form name="votes" method="post" action="submit-votes.php">
<table style="font-family:Tahoma, Geneva, sans-serif;">
<tr>
<td colspan="3"><center>
<h2 style="color:#116763;">ONLINE VOTING SYSTEM</h2>
<h4 style="color:#116763;">Presidents League</h4>
<h5 style="color:#116763;">2015 - 2016</h5></center>
<br />
</td>
</tr>
<tr>
<td id="bold">PRESIDENT:</td>
<td>
<select name="president" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s8=mysql_query("select*from president");

 while($rows8=mysql_fetch_array($s8,MYSQL_ASSOC))
{
  $presi=$rows8['pres'];
  echo"<option>$presi</option>";

}?>

</select>
</td>

<tr>
<td id="bold">VP INTERNAL:</td>
<td>
<select name="vpinternal" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s22=mysql_query("select*from vp_internal");

 while($rows22=mysql_fetch_array($s22,MYSQL_ASSOC))
{
  $vp22=$rows22['vp_internal'];
  echo"<option>$vp22</option>";

}?>
</select>
</td>
</tr>
<td id="bold">VP EXTERNAL:</td>
<td>
<select name="vpexternal" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s23=mysql_query("select*from vp_external");

 while($rows23=mysql_fetch_array($s23,MYSQL_ASSOC))
{
  $vp23=$rows23['vp_external'];
  echo"<option>$vp23</option>";

}?>
</select>
</td>
<tr>
<td id="bold">SECRETARY:</td>
<td>
<select name="secretary" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s24=mysql_query("select*from secretary");

 while($rows24=mysql_fetch_array($s24,MYSQL_ASSOC))
{
  $sec24=$rows24['secretary'];
  echo"<option>$sec24</option>";

}?>
</select>
</td>
</tr>
<tr>
<td id="bold">TREASURER:</td>
<td>
<select name="treasurer" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s25=mysql_query("select*from treasurer");

 while($rows25=mysql_fetch_array($s25,MYSQL_ASSOC))
{
  $tre25=$rows25['treasu'];
  echo"<option>$tre25</option>";

}?>
</select>
</td>
</tr>
<tr>
<td id="bold">AUDITOR:</td>
<td>
<select name="auditor" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s26=mysql_query("select*from auditor");

 while($rows26=mysql_fetch_array($s26,MYSQL_ASSOC))
{
  $aud26=$rows26['auditor'];
  echo"<option>$aud26</option>";

}?>
</select>
</td>
</tr>
<tr>
<td id="bold">FIRST YEAR REP1:</td>
<td>
<select name="fone" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s27=mysql_query("select*from fyr");

 while($rows27=mysql_fetch_array($s27,MYSQL_ASSOC))
{
  $f27=$rows27['fyr'];
  echo"<option>$f27</option>";

}?>
</select>
</td>
</tr>
<tr>
<td id="bold">FIRST YEAR REP2:</td>
<td>
<select name="ftwo" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s28=mysql_query("select*from fyre");

 while($rows28=mysql_fetch_array($s28,MYSQL_ASSOC))
{
  $f28=$rows28['fyre'];
  echo"<option>$f28</option>";

}?>
</select>
</td>
</tr>
<tr>
<td id="bold">SECOND YEAR REP1:</td>
<td>
<select name="sone" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s29=mysql_query("select*from syr");

 while($rows29=mysql_fetch_array($s29,MYSQL_ASSOC))
{
  $sec29=$rows29['syr'];
  echo"<option>$sec29</option>";

}?>
</select>
</td>
</tr>
<tr>
<td id="bold">SECOND YEAR REP2:</td>
<td>
<select name="stwo" id="dropdown">
<option value="Uncounted Vote(s)">Select Candidate</option>
<?php

  $s30=mysql_query("select*from syre");

 while($rows30=mysql_fetch_array($s30,MYSQL_ASSOC))
{
  $sa30=$rows30['syre'];
  echo"<option>$sa30</option>";

}?>
</select>
</td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" id="button" /></td>
</tr>
</table>
</form>
</div>
</center>
</div>

	</div>
	<div id="footer"></div>
</div>


	<span style="text-align:right; text-decoration:none;"></span>
</body>
</html>
