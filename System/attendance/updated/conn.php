<?php
	$conn = new mysqli('localhost', 'root', '', 'hrm_erp');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>