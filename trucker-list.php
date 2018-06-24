	<?php
	//variable declaration
	$q=$_GET["r"];

	//databse connection
	include_once 'conn.php';

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
	$row="SELECT * FROM truckers  WHERE id = '".$r."'";
	$result=mysql_query($row);


	while( $row = mysql_fetch_array( $result))
	 {
	 ?>
	<form name='recieving'>
	<input name="growercode" type="text" id="txt" value="<?php echo( htmlspecialchars( $row['trucker'] ) ); ?>" readonly  />
    <input name="address" type="text" id="txt" value="<?php echo( htmlspecialchars( $row['platenumber'] ) ); ?>" readonly />
	 <?php
	 }
	 ?>


