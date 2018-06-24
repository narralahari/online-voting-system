        <?php
	include 'conn.php';
	session_start();
	if(!isset($_SESSION['admin_email']))
	{
		header('location:admin_log.php');
	}
	$msg="";
	if(isset($_REQUEST['action']) && $_REQUEST['action']=='del')
	{
		$get_id=$_REQUEST['del_id'];
		$del="DELETE FROM login WHERE id='$get_id'";
		mysql_query($del) or mysql_error();
		$msg="<strong>Successfully Deleted</strong>";
	}
	if(isset($_POST['keyword']) && $_POST['SEARCH']=='Search')
	{
			$keyword=trim($_POST['keyword']);
			$src .= " WHERE fname like '$keyword%'";
	}


        // Activate code

        if(isset($_REQUEST['active_id']) && $_REQUEST['act']=='st')
	{
		$id=base64_decode($_REQUEST['active_id']);
		$sel_user="SELECT * FROM login WHERE id='$id'";
		$res=mysql_query($sel_user);
		$fet=mysql_fetch_array($res);
		if($fet['status']=='Active')
		{
			$upd="UPDATE login SET status='Inactive' WHERE id='$id'";
			$updr=mysql_query($upd);
			echo "<script>alert('Account Deactivated');
				window.location='admin_home.php';
			</script>";


		}
		else
		{
			$upd="UPDATE login SET status='Active' WHERE id='$id'";
			$updr=mysql_query($upd);
		echo "<script>alert('Account Activated');
				window.location='admin_home.php';
			</script>";

		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="SHORTCUT ICON" href="images/log.png">
<link rel="stylesheet" type="text/css" href="css/admin_style.css" />
<script language="javascript" type="text/javascript">
	function valid()
	{
		var keyword=document.getElementById('keyword').value;
		if(keyword.length==0)
		{
			alert('Please Enter The Firstname');
			document.getElementById('keyword').focus();
			return false;
		}
		return true;
	}
	function checkAll()
	{
		var formName="user";
		var checkBoxName="chbox[]";
		var form=document.forms[formName];
		var noOfCheckBox=form[checkBoxName].length;
		for(i=0;i<noOfCheckBox;i++)
		{
			form[checkBoxName][i].checked=true;
		}

	}
	function unCheckAll()
	{
		var formName="user";
		var checkBoxName="chbox[]";
		var form=document.forms[formName];
		var noOfCheckBox=form[checkBoxName].length;
		for(i=0;i<noOfCheckBox;i++)
		{
			form[checkBoxName][i].checked=false;
		}

	}
</script>
<title>Student Voting System</title>
</head>
<body style="background-color:green">
<div id="bar">
<div style="width:900px; margin:auto; padding-top:10px;">
<img src="images/aclc-logo.png" /></a><br><marquee scrolldelay="1" scrollamount="3"><font color="yellow">WELCOME ADMINISTRATOR.....YOU MAY ACTIVATE/DEACTIVATE AND SEARCH/DELETE STUDENT RECORDS</font></marquee>
</div>
</div>
<div id="subbar">
</div>
<div id="content">
<?php
	if(isset($_SESSION['FAILED'])){
	echo '<div style="background-color:#ffebe8; border:1px solid #dd3c10; padding:5px; color:#000; border-radius: 0px; font-family:tahoma; font-size:12px;">';
	echo $_SESSION['FAILED'];
	unset($_SESSION['FAILED']);
	echo '</div>';
}?>
<center><br><br>
<div id="main">
	<div id="header">
		<h1><a href="admin_home.php" style="font-size:50px">Admin Panel</a></h1>
		<p class="right">Welcome Administrator||<a href="admin_logout.php" style="">Logout</a></p>
	</div>

	<div id="content">
		<div style="height:20px; color:#669900; margin-top:10px;">
		<?php echo $msg; ?>
		</div>
		<form name="user" method="post">
		<table align="center" class="tbl">

			<tr>

				<td colspan="7" align="right"><b style="color:#FF0000; font-size:18px; font-family:'Courier New', Courier, monospace">Enter The Firstname :</b><input type="text" name="keyword" value="<?php echo $keyword; ?>" id="keyword" /><input type="submit" name="SEARCH" value="Search" onclick="return valid();" /><input type="button" name="showall" value="Show All" onClick="window.location='admin_home.php'" /></td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<th>Firstname</th>
					<th>Lastname</th>
				<th>Roll No</th>
				<th>Gender</th>
				<th>Semester</th>
				<th>Branch</th>
				<th>Password</th>
                                <th>Date/Time</th>
                                <th>Status</th>
                <th>Activate/Deactivate</th>
				<th>Action</th>
			</tr>
			<?php
				$q="SELECT ct.city_name,lgn.* FROM login lgn INNER JOIN city ct ON ct.city_id=lgn.city_id".$src;
				$q .=" ORDER by lname desc";
				$sel=mysql_query($q);
				$row=mysql_num_rows($sel);
				if($row>0)
				{
					while($fet=mysql_fetch_array($sel))
					{
			 ?>
			<tr height="50">
				<td><input type="checkbox" name="chbox[]" value="<?php echo $fet['id']; ?>" /></td>
				<td><?php echo $fet['fname'];?></td>
				<td><?php echo $fet['lname'];?></td>
				<td><?php echo $fet['email'];?></td>
				<td><?php echo $fet['gender'];?></td>
				<td><?php echo $fet['hobby'];?></td>
				<td><?php echo $fet['city_name'];?></td>
				<td><?php echo $fet['psw'];?></td>
                                <td><?php echo $fet['image'];?></td>
                                <td><?php  if($fet['status']=='Active') {
					echo "<span style='color:BLUE'>Active</span>";
					}
					else
					{
						echo "<span style='color:red'>Inactive</span>";
					}
				?>
                                </td>
				<th>
				<a href="?active_id=<?php echo base64_encode($fet['id']);?>&amp;act=st"><?php
				if($fet['status'] == 'Inactive')
				{
					echo "Activate";
				}
				else
				{
					echo "Deactivate";
				}
				?>

					</a>
				</th>
				<th align="center"><a href="javascript:if(confirm('Are You Sure, You Want To Delete This Record?')) {location.href='admin_home.php?del_id=<?php echo $fet['id']; ?>&amp;action=del'};" ><img src="images/del.jpeg" width="30" height="30"/></a></th>
			</tr>
			<?php
					}//end while
				}//end if
				else
				{
			?>
			<tr>
				<td colspan="8" align="center"><b style="color:#FF0000; font-size:24px;">No Records Found.</b></td>
			</tr>
			<?php
				}
			?>
			<tr>
				<td colspan="9"><input type="submit" name="DELETE" value="Delete" /> <a href="#" onclick="javascript:checkAll();">Check All</a><a href="#" onclick="javascript:unCheckAll();">Uncheck All</a></td>
			</tr>
		</table>
		</form>
	</div>
	<div id="footer">
		<font color="black"><p >Project By : JYOTI</font>
		</p>
	</div>
</div>
</body>
</html>
<?php
	//Multiple Delete Code
	if(isset($_POST['DELETE']) && $_POST['DELETE']=='Delete')
	{
		$id=$_POST['chbox'];
		//print_r($id);
		//counts total number of ids stored in $id
		$cnt=count($id);

		for($i=0;$i<$cnt;$i++)
		{
			echo $del="DELETE FROM login WHERE id='$id[$i]'";
			mysql_query($del);
		}
		echo "<script>alert('Successfully Deleted');
			window.location='admin_home.php';
		</script>";
	}


?>
</center>
</div>

</body>
</html>