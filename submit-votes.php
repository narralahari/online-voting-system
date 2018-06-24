<?php
	//session
	session_start();

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

		//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	//Variable Declarations for votes table
	$president = clean($_POST['president']);
	$vpinternal = clean($_POST['vpinternal']);
	$vpexternal = clean($_POST['vpexternal']);
	$secretary = clean($_POST['secretary']);
	$treasurer = clean($_POST['treasurer']);
	$auditor = clean($_POST['auditor']);
	$fone = clean($_POST['fone']);
	$ftwo = clean($_POST['ftwo']);
	$sone = clean($_POST['sone']);
	$stwo = clean($_POST['stwo']);
	$email = $_SESSION['email'];



		if($email != ''){
		$qry = "SELECT * FROM votes WHERE voters='$email'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr = '<i>You already submitted your votes. Please <a href="logout.php" style="color:#004e49;"><u>Logout.</u></a></i>';
				$_SESSION['ALREADY'] = $errmsg_arr;
				$errflag = true;
				session_write_close();
				header('location: home.php');
		exit();
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}


	if($fone == $ftwo or $sone == $stwo){
		$duplicate = '<i>Do not duplicate the name of candidate in first or second year representative. Please select your candidates again.</i>';
		$_SESSION['DUPLICATE'] = $duplicate;
		session_write_close();
		header("location: home.php");
		exit();
	}

	//student votes
	$sql=("INSERT INTO votes (voters, president, invp, exvp, secretary, treasurer, auditor, fone, ftwo, sone, stwo) VALUES ('$email','$president','$vpinternal','$vpexternal','$secretary','$treasurer','$auditor','$fone','$ftwo','$sone','$stwo')");
	if (!mysql_query($sql,$link))
  	{
  	die('Error: ' . mysql_error());
  	}
  	//show a message query excecuted.
	$saved ='<i>You have successfully submitted your votes. Thank you for voting.</i>';
	$_SESSION['SAVED'] = $saved;
	session_write_close();
	header("location: home.php");
	mysql_close($link);
?>