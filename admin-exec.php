<?php
	//Start session
	session_start();

	//Include database connection details
	require_once('config.php');

	//Array to store validation errors
	$errmsg_arr = array();

	//Validation error flag
	$errflag = false;

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

	//Sanitize the POST values
	$admin = clean($_POST['admin']);

	//Check for duplicate login ID
	if($admin != '$admin') {
		$qry = "SELECT * FROM admin WHERE admin='$admin'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Please login your account.';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//login failed message
	$failed = '<i>Invalid Code. Please try again.</i>';
	
	//Create query
	$qry="SELECT * FROM admin WHERE admin='$admin'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_ID'] = $member['member_id'];
			$_SESSION['SESS_ADMIN'] = $member['admin'];
			session_write_close();
			header("location: administrator.php");
			exit();
		}else {
			
			//show a message query excecuted.
			$_SESSION['FAILED'] = $failed;
			session_write_close();
			header("location: administrator-index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>