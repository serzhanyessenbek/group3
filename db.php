<?php 

	try{

    	$connnection = new PDO('mysql:host=localhost;dbname=club', 'root', '');
	
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	function addTeams ($name, $country, $city)
	{
		global $connnection;

		$query = $connnection->prepare("
				INSERT INTO teams (name, country_id, city_id)
				VALUES (:c_name, :c_country_id, :c_city_id);
			");


		$rows = $query->execute(array("c_name"=>$name, "c_country_id" => $country, "c_city_id" => $city));

		return $rows>0;
	}

	function getAllTeams()
	{
		global $connnection;

		$query = $connnection->prepare("
			SELECT t.id, t.name, country.name as country_name, c.name as city_name
			FROM teams t
			LEFT OUTER JOIN cities c ON c.id = t.city_id 
			LEFT OUTER JOIN countries country ON country.id = c.country_id
			");

		$query->execute();
		$result = $query->fetchAll();
		
		return $result;
	}

	function getAllConutries()
	{
		global $connnection;

		$query = $connnection->prepare("
			SELECT * FROM countries
			");

		$query->execute();
		$result = $query->fetchAll();
		
		return $result;
	}

		function getAllCities()
	{
		global $connnection;

		$query = $connnection->prepare("
			SELECT * FROM cities
			");

		$query->execute();
		$result = $query->fetchAll();
		
		return $result;
	}
 ?>