<?php 
	require_once 'db.php';
	$countries = getAllConutries();
	$cities = getAllCities();
	$teams = getAllTeams();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teams</title>
</head>
<body>
	<form action="addTeams.php" method="post">
		
		<p>Team name : <input type="text" name="name"></p>
		<p>Team country : 
			<select name="country_id" id="">
				<?php 
					for ($i=0; $i < sizeof($countries); $i++) { 
				?>
					<option value=<?php echo $countries[$i]['id'] ;?>><?php echo $countries[$i]['name']; ?></option>
				<?php
					}
				?>
			</select>
		</p>
		<p>Team city : 
			<select name="city_id" id="">
				<?php 
					for ($i=0; $i < sizeof($cities); $i++) { 
				?>
					<option value=<?php echo $cities[$i]['id'] ;?>><?php echo $cities[$i]['name']; ?></option>
				<?php
					}
				?>
			</select>
		</p>
		<button>SUBMIT</button>
	</form>

	<table>
		<tr>
			<td>
				id
			</td>
			<td>
				name
			</td>
			<td>country name</td>
			<td>city name</td>
		</tr>
		<tr>
			<?php 
				foreach ($teams as $team) {
			?>
				<tr>
					<td>
						<?php echo $team['id']; ?>
					</td>					
					<td>
						<?php echo $team['name']; ?>
					</td>					
					<td>
						<?php echo $team['country_name']; ?>
					</td>
					<td>
						<?php echo $team['city_name']; ?>
					</td>
				</tr>
			<?php
			}
			 ?>
		</tr>
	</table>

</body>
</html>
 