<?php

	// Loader - class and connection
	include('loader.php');
	
	// Catch start, end and id from javascript
	$id = $_POST['id'];
	$event_title = $_POST['title_update'];
	$event_description = $_POST['description_update'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	
	if(isset($_POST['url_update'])) {
		$url = $_POST['url_update'];
	} else {
		$url = '?page=';	
	}
	
	if($calendar->updates($id, $event_title, $event_description, $url, $start_date, $end_date, $start_time, $end_time) === true) {
		return true;	
	} else {
		return false;	
	}

?>