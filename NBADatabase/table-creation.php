<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="NBAdb";

//connect to the server

$conn = mysqli_connect($servername,$username,$password,$dbname);


//check to see if connection succeeded 


if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}



$sql = " CREATE TABLE Players (
player_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
height INT(6) UNSIGNED,
weight INT(6) UNSIGNED,
age INT(6) UNSIGNED,
years_in_league INT(6) UNSIGNED,
school VARCHAR(30) NOT NULL,
team_id INT(6) UNSIGNED,
stat_id INT(6) UNSIGNED

)";


$sql2 = " CREATE TABLE Teams (
team_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
city VARCHAR(30) NOT NULL,
num_of_wins INT(6) UNSIGNED,
num_of_losses INT(6) UNSIGNED,
division_id BOOLEAN
)";

$sql3 = " CREATE TABLE Coaches (
coach_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
years_coaching INT(30) UNSIGNED,
team_id INT(6) UNSIGNED
)";


$sql4 = " CREATE TABLE Divisions (
division_id INT(6) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
)";

$sql5 = " CREATE TABLE Stats (
stat_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
points INT(6),
blocks INT(6),
steals INT(6),
assist INT(6),
turnover INT(6),
field_goal INT(6)
)";

$sql6 = " CREATE TABLE Games (
game_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
game_date DATE,
home_team INT(6) UNSIGNED, 
away_team INT(6) UNSIGNED,
FOREIGN KEY (home_team) REFERENCES Teams(team_id),
FOREIGN KEY (away_team) REFERENCES Teams(team_id)
)";

$sql7 = " CREATE TABLE Playoff (
playoff_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
team_id INT(6) UNSIGNED,
FOREIGN KEY(team_id) REFERENCES Teams(team_id)
)";





$tables = array($sql,$sql2,$sql3,$sql4,$sql5,$sql6,$sql7);

for($i = 0; $i < count($tables); $i++) {

if(mysqli_query($conn,$tables[$i])) {

	echo "Successful " . $i . " "; 
} else {

	echo "Error Code: " . mysqli_connect_error();
}

}

//Adding foriegn keys to the other tables
$sql = "ALTER TABLE Players
ADD FOREIGN KEY (team_id) REFERENCES Teams(team_id),
ADD FOREIGN KEY (stat_id) REFERENCES Stats(stat_id)

;";

$sql2 = "ALTER TABLE Teams
ADD FOREIGN KEY(division_id) REFERENCES Divisions(division_id);
;";

$sql3 = "ALTER TABLE Coaches
ADD FOREIGN KEY(team_id) REFERENCES Teams(team_id);
;";

$testArr = array($sql,$sql2,$sql3);


for($i = 0; $i < count($testArr); $i++ ) {
if(mysqli_query($conn,$testArr[$i])) {

	echo "Successful FK " . $i . " "; 
} else {

	echo "Error Code: " . mysqli_connect_error();
}
}


//close connection to server
mysqli_close($conn);

?>