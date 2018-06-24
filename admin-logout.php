<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_ID']);
	unset($_SESSION['ADMIN']);
	header ('location: administrator-index.php');
?>