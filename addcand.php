
<html>
<head><title> </title>
<link href="css.css" rel="stylesheet">
<script src="js/add_cand.js" type="text/javascript"></script>

<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="SHORTCUT ICON" href="images/log.png">
</head>
<body bgcolor="black">
<div id="bar">
<div style="width:900px; margin:auto; padding-top:10px;">
<img src="images/aclc-logo.png" /></a><marquee scrolldelay="1" scrollamount="3" direction="left" width="700"><font color='yellow' style='font-family:arial'><b>PLEASE ADD NEW CANDIDATE FOR ELECTION</font></marquee>
</div>
</div>

<div id="subbar">
<table style="padding-top:80px; width:885px; margin:auto; text-align:right;">
<tr>
<td id="bold" style="color:#FFF; padding-left:10px;">
<a href="generating.php">Election Results</a>  | <a href="addcand.php">Add Election Candidates</a> | <a href="admin-logout.php">Logout</a>

</td>
</tr>
</table>
</div>

 <?php
require_once('admin-auth.php');
echo"<form method='POST' action='' name='add' onSubmit  >
<center>
<div class='contmain'>

<h5 align='right'><a href='administrator.php'><font color='black' style='font-family:arial'><b>CLICK HERE FOR ADMINISTRATOR PAGE &nbsp </a></b></font></h5>
<div class='left'><table bgcolor='#556B2F' width='600' height='1000'>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>PRESIDENT:<td width='100'><input type='text' name='p'><td><input type='submit' name='b1' value='Add' onclick='f1()'><td><input type='submit' name='c1' value='Remove' onclick='r1()'><td><input type='submit' name='d1' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>VP INTERNAL:<td width='100'><input type='text' name='vp_i'><td><input type='submit' name='b2' value='Add' onclick='f2()' ><td><input type='submit' name='c2' value='Remove' onclick='r2()'><td><input type='submit' name='d2' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>VP EXTERNAL:<td width='100'><input type='text' name='vp_e'><td><input type='submit' name='b3' value='Add' onclick='f3()'><td><input type='submit' name='c3' value='Remove' onclick='r3()'><td><input type='submit' name='d3' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>SECRETARY:<td width='100'><input type='text' name='secre'><td><input type='submit' name='b4' value='Add' onclick='f4()'><td><input type='submit' name='c4' value='Remove' onclick='r4()'><td><input type='submit' name='d4' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>TREASURER:<td width='100'><input type='text' name='treasu'><td><input type='submit' name='b5' value='Add' onclick='f5()'><td><input type='submit' name='c5' value='Remove' onclick='r5()'><td><input type='submit' name='d5' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>AUDITOR:<td width='100'><input type='text' name='audit'><td><input type='submit' name='b6' value='Add' onclick='f6()'><td><input type='submit' name='c6' value='Remove' onclick='r6()'><td><input type='submit' name='d6' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>FIRST YEAR REP1:<td width='100'><input type='text' name='fyr'><td><input type='submit' name='b7' value='Add' onclick='f7()'><td><input type='submit' name='c7' value='Remove' onclick='r7()'><td><input type='submit' name='d7' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>FIRST YEAR REP2:<td width='100'><input type='text' name='fyre'><td><input type='submit' name='b8' value='Add' onclick='f8()'><td><input type='submit' name='c8' value='Remove' onclick='r8()'><td><input type='submit' name='d8' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>SECOND YEAR REP1:<td width='100'><input type='text' name='syr'><td><input type='submit' name='b9' value='Add' onclick='f9()'><td><input type='submit' name='c9' value='Remove' onclick='r9()'><td><input type='submit' name='d9' value='Viewall'></td></tr></table>

<tr><td>
<center><table bgcolor='#BA55D3' width='600' height='70'>
<tr><td width='200'>SECOND YEAR REP2:<td width='100'><input type='text' name='syre'><td><input type='submit' name='b10' value='Add' onclick='f10()'><td><input type='submit' name='c10' value='Remove' onclick='r10()'><td><input type='submit' name='d10' value='Viewall'></td></tr></table>

</td></tr></table></center></div>";

 echo"<div class='right'><br>";
require'db_conn.php';

$pre=$_POST['p'];
$vpi=$_POST['vp_i'];
$vpe=$_POST['vp_e'];
$secre=$_POST['secre'];
$treasu=$_POST['treasu'];
$audi=$_POST['audit'];
$fyr=$_POST['fyr'];
$fyre=$_POST['fyre'];
$syr=$_POST['syr'];
$syre=$_POST['syre'];


if(isset($_POST['b1']))
{

  $q1=mysql_query("insert into president values('$pre')");

if($q1)
{
     $s1=mysql_query("select*from president");
    echo"<center><table border='1'><tr><td>PRESIDENT</td></tr>";
 while($rows1=mysql_fetch_array($s1,MYSQL_ASSOC))
{
  $president=$rows1['pres'];
  echo"<tr><td>$president</td></tr>";
}
echo"</table></center>";
}


}


if(isset($_POST['b2']))
{

  $q2=mysql_query("insert into vp_internal values('$vpi')");

if($q2)
{
 $s2=mysql_query("select*from vp_internal");
    echo"<center><table border='1'><tr><td>VP INTERNAL</td></tr>";
 while($rows2=mysql_fetch_array($s2,MYSQL_ASSOC))
{
  $vp_internal=$rows2['vp_internal'];
  echo"<tr><td>$vp_internal</td></tr>";
}
echo"</table></center>";
}
}



if(isset($_POST['b3']))
{

  $q3=mysql_query("insert into vp_external values('$vpe')");

if($q3)
{
  $s3=mysql_query("select*from vp_external");
  echo"<center><table border='1'><tr><td>VP EXTERNAL</td></tr>";
 while($rows3=mysql_fetch_array($s3,MYSQL_ASSOC))
{
  $vp_external=$rows3['vp_external'];
  echo"<tr><td>$vp_external</td></tr>";
}
echo"</table></center>";
}
}


if(isset($_POST['b4']))
{

  $q4=mysql_query("insert into secretary values('$secre')");

if($q4)
{
  $s4=mysql_query("select*from secretary");
    echo"<center><table border='1'><tr><td>SECRETARY</td></tr>";
 while($rows4=mysql_fetch_array($s4,MYSQL_ASSOC))
{
  $secretary=$rows4['secretary'];
  echo"<tr><td>$secretary</td></tr>";
}
echo"</table></center>";
}
}

if(isset($_POST['b5']))
{

  $q5=mysql_query("insert into treasurer values('$treasu')");

if($q5)
{
  $s5=mysql_query("select*from treasurer");
    echo"<center><table border='1'><tr><td>TREASURER</td></tr>";
 while($rows5=mysql_fetch_array($s5,MYSQL_ASSOC))
{
  $treasurer=$rows5['treasu'];
  echo"<tr><td>$treasurer</td></tr>";
}
echo"</table></center>";
}
}


if(isset($_POST['b6']))
{

  $q6=mysql_query("insert into auditor values('$audi')");

if($q6)
{
  $s6=mysql_query("select*from auditor");
    echo"<center><table border='1'><tr><td>AUDITOR</td></tr>";
 while($rows6=mysql_fetch_array($s6,MYSQL_ASSOC))
{
  $auditor=$rows6['auditor'];
  echo"<tr><td>$auditor</td></tr>";
}
echo"</table></center>";
}
}

if(isset($_POST['b7']))
{

  $q7=mysql_query("insert into fyr values('$fyr')");

if($q7)
{
  $s7=mysql_query("select*from fyr");
    echo"<center><table border='1'><tr><td>FIRST YEAR REP1</td></tr>";
 while($rows7=mysql_fetch_array($s7,MYSQL_ASSOC))
{
  $first=$rows7['fyr'];
  echo"<tr><td>$first</td></tr>";
}
echo"</table></center>";
}
}

if(isset($_POST['b8']))
{

  $q8=mysql_query("insert into fyre values('$fyre')");

if($q8)
{
  $s8=mysql_query("select*from fyre");
    echo"<center><table border='1'><tr><td>FIRST YEAR REP2</td></tr>";
 while($rows8=mysql_fetch_array($s8,MYSQL_ASSOC))
{
  $firsty=$rows8['fyre'];
  echo"<tr><td>$firsty</td></tr>";
}
echo"</table></center>";
}
}

if(isset($_POST['b9']))
{

  $q9=mysql_query("insert into syr values('$syr')");

if($q9)
{
  $s9=mysql_query("select*from syr");
    echo"<center><table border='1'><tr><td>SECOND YEAR REP1</td></tr>";
 while($rows9=mysql_fetch_array($s9,MYSQL_ASSOC))
{
  $second=$rows9['syr'];
  echo"<tr><td>$second</td></tr>";
}
echo"</table></center>";
}
}


if(isset($_POST['b10']))
{

  $q10=mysql_query("insert into syre values('$syre')");

if($q10)
{
  $s10=mysql_query("select*from syre");
    echo"<center><table border='1'><tr><td>SECOND YEAR REP2</td></tr>";
 while($rows10=mysql_fetch_array($s10,MYSQL_ASSOC))
{
  $secondy=$rows10['syre'];
  echo"<tr><td>$secondy</td></tr>";
}
echo"</table></center>";
}
}


if(isset($_POST['c1']))
{

  $delete1=mysql_query("delete from president where pres='$pre'");

if($delete1)
{
   $s11=mysql_query("select*from president");
    echo"<center><table border='1'><tr><td>PRESIDENT</td></tr>";
 while($rows11=mysql_fetch_array($s11,MYSQL_ASSOC))
{
  $presi=$rows11['pres'];
  echo"<tr><td>$presi</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}
if(isset($_POST['c2']))
{

  $delete2=mysql_query("delete from vp_internal where vp_internal='$vpi'");

if($delete2)
{
   $s12=mysql_query("select*from vp_internal");
    echo"<center><table border='1'><tr><td>VP INTERNAL</td></tr>";
 while($rows12=mysql_fetch_array($s12,MYSQL_ASSOC))
{
  $vpi12=$rows12['vp_internal'];
  echo"<tr><td>$vpi12</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}

if(isset($_POST['c3']))
{

  $delete3=mysql_query("delete from vp_external where vp_external='$vpe'");

if($delete3)
{
   $s13=mysql_query("select*from vp_external");
    echo"<center><table border='1'><tr><td>VP EXTERNAL</td></tr>";
 while($rows13=mysql_fetch_array($s13,MYSQL_ASSOC))
{
  $vpe13=$rows13['vp_external'];
  echo"<tr><td>$vpe13</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}

if(isset($_POST['c4']))
{

  $delete4=mysql_query("delete from secretary where secretary='$secre'");

if($delete4)
{
   $s14=mysql_query("select*from secretary");
    echo"<center><table border='1'><tr><td>SECRETARY</td></tr>";
 while($rows14=mysql_fetch_array($s14,MYSQL_ASSOC))
{
  $sec14=$rows14['secretary'];
  echo"<tr><td>$sec14</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}
if(isset($_POST['c5']))
{

  $delete5=mysql_query("delete from treasurer where treasu='$treasu'");

if($delete5)
{
   $s15=mysql_query("select*from treasurer");
    echo"<center><table border='1'><tr><td>TREASURER</td></tr>";
 while($rows15=mysql_fetch_array($s15,MYSQL_ASSOC))
{
  $tre15=$rows15['treasu'];
  echo"<tr><td>$tre15</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}if(isset($_POST['c6']))
{

  $delete6=mysql_query("delete from auditor where auditor='$audi'");

if($delete6)
{
   $s16=mysql_query("select*from auditor");
    echo"<center><table border='1'><tr><td>AUDITOR</td></tr>";
 while($rows16=mysql_fetch_array($s16,MYSQL_ASSOC))
{
  $aud16=$rows16['auditor'];
  echo"<tr><td>$aud16</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}
if(isset($_POST['c7']))
{

  $delete7=mysql_query("delete from fyr where fyr='$fyr'");

if($delete7)
{
   $s17=mysql_query("select*from fyr");
    echo"<center><table border='1'><tr><td>FIRST YEAR REP1</td></tr>";
 while($rows17=mysql_fetch_array($s17,MYSQL_ASSOC))
{
  $f17=$rows17['fyr'];
  echo"<tr><td>$f17</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}
if(isset($_POST['c8']))
{

  $delete8=mysql_query("delete from fyre where fyre='$fyre'");

if($delete8)
{
   $s18=mysql_query("select*from fyre");
    echo"<center><table border='1'><tr><td>FIRST YEAR REP2</td></tr>";
 while($rows18=mysql_fetch_array($s18,MYSQL_ASSOC))
{
  $f18=$rows18['fyre'];
  echo"<tr><td>$f18</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}
if(isset($_POST['c9']))
{

  $delete9=mysql_query("delete from syr where syr='$syr'");

if($delete9)
{
   $s19=mysql_query("select*from syr");
    echo"<center><table border='1'><tr><td>SECOND YEAR REP1</td></tr>";
 while($rows19=mysql_fetch_array($s19,MYSQL_ASSOC))
{
  $syr=$rows19['syr'];
  echo"<tr><td>$syr</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}
if(isset($_POST['c10']))
{

  $delete10=mysql_query("delete from syre where syre='$syre'");

if($delete10)
{
   $s20=mysql_query("select*from syre");
    echo"<center><table border='1'><tr><td>SECOND YEAR REP2</td></tr>";
 while($rows20=mysql_fetch_array($s20,MYSQL_ASSOC))
{
  $syre=$rows20['syre'];
  echo"<tr><td>$syre</td></tr>";
}
echo"</table></center>";
}
else
{
  echo"Not Remove";
}
}
if(isset($_POST['d1']))
{
$s21=mysql_query("select*from president");
    echo"<center><table border='1'><tr><td>PRESIDENT</td></tr>";
 while($rows21=mysql_fetch_array($s21,MYSQL_ASSOC))
{
  $pre21=$rows21['pres'];
  echo"<tr><td>$pre21</td></tr>";
}
echo"</table></center>";
}
if(isset($_POST['d2']))
{
$s22=mysql_query("select*from vp_internal");
    echo"<center><table border='1'><tr><td>VP INTERNAL</td></tr>";
 while($rows22=mysql_fetch_array($s22,MYSQL_ASSOC))
{
  $vpi22=$rows22['vp_internal'];
  echo"<tr><td>$vpi22</td></tr>";
}
echo"</table></center>";
}
if(isset($_POST['d3']))
{
$s23=mysql_query("select*from vp_external");
    echo"<center><table border='1'><tr><td>VP EXTERNAL</td></tr>";
 while($rows23=mysql_fetch_array($s23,MYSQL_ASSOC))
{
  $vpe23=$rows23['vp_external'];
  echo"<tr><td>$vpe23</td></tr>";
}
echo"</table></center>";
}

if(isset($_POST['d4']))
{
$s24=mysql_query("select*from secretary");
    echo"<center><table border='1'><tr><td>SECRETARY</td></tr>";
 while($rows24=mysql_fetch_array($s24,MYSQL_ASSOC))
{
  $sec24=$rows24['secretary'];
  echo"<tr><td>$sec24</td></tr>";
}
echo"</table></center>";
}
if(isset($_POST['d5']))
{
$s25=mysql_query("select*from treasurer");
    echo"<center><table border='1'><tr><td>TREASURER</td></tr>";
 while($rows25=mysql_fetch_array($s25,MYSQL_ASSOC))
{
  $tre25=$rows25['treasu'];
  echo"<tr><td>$tre25</td></tr>";
}
echo"</table></center>";
}
if(isset($_POST['d6']))
{
$s26=mysql_query("select*from auditor");
    echo"<center><table border='1'><tr><td>AUDITOR</td></tr>";
 while($rows26=mysql_fetch_array($s26,MYSQL_ASSOC))
{
  $aud26=$rows26['auditor'];
  echo"<tr><td>$aud26</td></tr>";
}
echo"</table></center>";
}
if(isset($_POST['d7']))
{
$s27=mysql_query("select*from fyr");
    echo"<center><table border='1'><tr><td>FIRST YEAR REP1</td></tr>";
 while($rows27=mysql_fetch_array($s27,MYSQL_ASSOC))
{
  $f27=$rows27['fyr'];
  echo"<tr><td>$f27</td></tr>";
}
echo"</table></center>";
}
if(isset($_POST['d8']))
{
$s28=mysql_query("select*from fyre");
    echo"<center><table border='1'><tr><td>FIRST YEAR REP2</td></tr>";
 while($rows28=mysql_fetch_array($s28,MYSQL_ASSOC))
{
  $f28=$rows28['fyre'];
  echo"<tr><td>$f28</td></tr>";
}
echo"</table></center>";
}

if(isset($_POST['d9']))
{
$s29=mysql_query("select*from syr");
    echo"<center><table border='1'><tr><td>SECOND YEAR REP1</td></tr>";
 while($rows29=mysql_fetch_array($s29,MYSQL_ASSOC))
{
  $syr29=$rows29['syr'];
  echo"<tr><td>$syr29</td></tr>";
}
echo"</table></center>";
}

if(isset($_POST['d10']))
{
$s30=mysql_query("select*from syre");
    echo"<center><table border='1'><tr><td>SECOND YEAR REP2</td></tr>";
 while($rows30=mysql_fetch_array($s30,MYSQL_ASSOC))
{
  $syr30=$rows30['syre'];
  echo"<tr><td>$syr30</td></tr>";
}
echo"</table></center>";
}


echo"</table></center>
</div></div></center>";

 echo" </form></body> </html>";

?>

