<?php
	
	// Database Connection
	include('connection.php');
	
	// Calendar Class
	include('Calendar.php');
	
	// Starts the Calendar Class @params 'DB Server', 'DB Username', 'DB Password', 'DB Name', 'Table Name'
	$calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE);

?>