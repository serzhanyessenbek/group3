<?php 

	require_once 'db.php';

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		

		$name = $_POST['name'];
		$country_id = $_POST['country_id'];
		$city_id = $_POST['city_id'];

		$rows =  addTeams($name, $country_id, $city_id);
		
		header("Location:index.php");

	}
 ?>