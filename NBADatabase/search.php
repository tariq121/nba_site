

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="search.php" method="POST">
  <p>Please select your gender:</p>
  <input type="radio" id="players" name="data" value="players">
  <label for="players">Players</label><br>
  <input type="radio" id="coaches" name="data" value="coaches">
  <label for="coaches">Coaches</label><br>
  <input type="radio" id="teams" name="data" value="teams">
  <label for="teams">Teams</label>

<br>
  <input type="submit" value="Submit">
</form>

<br>
<br>
<br>



<table>
	<tr>
		<th>First</th>
		<th>Last</th>
		<th>School</th>
		<th>Age</th>
		<th>Years Pro</th>
		<th>Height</th>
		<th>Weight</th>
	</tr>
	
<?php
$dbservername = "localhost";
$dbusername = "root";
$dbPassword = "";
$dbName = "nbadb";


$con = mysqli_connect($dbservername,$dbusername,$dbPassword,$dbName);

$table = $_POST['data'];


$sql = "SELECT firstname, lastname, height, age, weight, years_in_league, school FROM $table";
$result = $con -> query($sql);

if($result -> num_rows> 0) {
	while($row = $result -> fetch_assoc()) {

		echo "<tr><td>" .$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['school']."</td><td>".$row['age']."</td><td>".$row['years_in_league']."</td><td>".$row['height']."</td><td>".$row['weight']."</td></tr>";

	}
	echo "</table>";


}

?>


</table>










</body>
</html>