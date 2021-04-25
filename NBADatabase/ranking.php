<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="ranking.php" method="POST">
  <p>Please select your which stat to rank players by:</p>
  <input type="radio" id="players" name="data" value="max">
  <label for="players">Points</label><br>
  <input type="radio" id="coaches" name="data" value="stls">
  <label for="coaches">Steals</label><br>
  <input type="radio" id="teams" name="data" value="blk">
  <label for="teams">Blocks</label>


<br>
  <input type="submit" value="Submit">
</form>


	<table>
	<tr>
		<th>First</th>
		<th>Last</th>
		<th>Points</th>
		<th>Steals</th>
		<th>Blocks</th>
		
	</tr>
	

<?php
include_once 'includes2.php';
$stt = $_POST['data'];

if (is_null($stt)) {

$stt = "max";
}

$sql = "SELECT players.firstname, players.lastname, stats.points AS max, stats.blocks AS blk, stats.steals as stls 
FROM stats
INNER JOIN players ON stats.stat_id = players.stat_id
ORDER BY `$stt` desc ;";

$result = $con -> query($sql);
if($result -> num_rows> 0) {
	while($row = $result -> fetch_assoc()) {

		echo "<tr><td>" .$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['max']."</td><td>".$row['stls']."</td><td>".$row['blk']."</td></tr>";

	}
	echo "</table>";


}
?>


</table>

</body>
</html>