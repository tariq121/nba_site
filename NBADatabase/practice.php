
<?php 




 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h3>STATS: </h3>
<form action="search.inc.php" method="POST">
	
	<input type="number" min= "0"  name="pts" placeholder="points"> <br>
	<input type="number" min="0" name="blocks" placeholder="blocks"> <br>
	<input type="number" min="0"  name="steals" placeholder="steals"> <br>
	<input type="number" min="0" name="assists" placeholder="assists"> <br>
	<input type="number" min="0" name="turnover" placeholder="turnovers"> <br>
	<input type="number" min="0" max="100" name="fg" placeholder="field goal"> <br>
	<button type ="submit" name="submit">SUBMIT</button>

</form>
<br>
<br>

<h3>Player</h3>	

<form action="includes.php" method="POST">
	<input type="text" name="first" placeholder="first"> <br>
	<input type="text" name="last" placeholder="last"> <br>
	<input type="text" name="school" placeholder="school"> <br>
	<input type="number" min= "0" max="30" name="years" placeholder="years in league"> <br>
	<input type="number" min="1" max="75" name="age" placeholder="age"> <br>
	<input type="number" min="50" max="100" name="height" placeholder="height"> <br>
	<input type="number" min="50" max="400" name="weight" placeholder="weight"> <br>
	<input type="number" min="0" name="stat" placeholder="stat id"> <br>
	<input type="number" min="0" name="team" placeholder="team id"> <br>
	<button type ="submit" name="submit">SUBMIT</button>

</form>

<table>
	<tr>
		<th>Name</th>
		<th>Team</th>
	</tr>

<?php 
include_once 'includes2.php';
$sql = "SELECT name, team_id FROM teams";
$result = $con -> query($sql);

if($result -> num_rows> 0) {
	while($row = $result -> fetch_assoc()) {

		echo "<tr><td>" .$row['name']."</td><td>".$row['team_id']."</td></tr>";

	}
	echo "</table>";


}
	

 ?>

</table>





</body>
</html>