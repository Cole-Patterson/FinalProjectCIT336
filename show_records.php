<html>
<style>
body { background-color: #D8E3FF}
#wrapper { text-align: center;
			background-color: #365EC6;
			width: 85%;
			margin-right: auto;
			margin-left: auto;
			padding-bottom: 45px;
			min-width: 900px;
			max-width: 1280px;
			box-shadow: 3px 3px 3px 3px #666666;}
#form1 { display: inline-block; }
h1 { color: #FEFEFE; }
tr { background-color: #999A9B;}
tr:nth-child(even) {background-color: #f2f2f2;}
tr:hover {background-color: #f5f5f5;}
table {
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
}
}
table, th, td {
  border: 1px solid black;
}
th, td {
  padding: 15px;
  text-align: left;
}
a { margin: 8px 0;
	width: 25%;
	}
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center; 
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
</style>
<div id="wrapper">
<?php
/* Attempt MySQL server connection.*/
$link = mysqli_connect("localhost", "root", "", "workout");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query 
$sql = "SELECT * FROM lift";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<h2>Lift Logs</h2>";
		echo "<table>";
            echo "<tr>";
				echo "<th>Date</th>";
                echo "<th>Exercise</th>";
                echo "<th>Sets</th>";
                echo "<th>Reps</th>";
				echo "<th>Weight</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
				echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['exercise'] . "</td>";
                echo "<td>" . $row['sets'] . "</td>";
                echo "<td>" . $row['reps'] . "</td>";
				echo "<td>" . $row['weight'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close results
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Attempt Select from Goals		
$sql = "SELECT * FROM goals";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<h2>Lift Goals</h2>";
		echo "<table>";
            echo "<tr>";
                echo "<th>Exercise</th>";
                echo "<th>Sets</th>";
                echo "<th>Reps</th>";
				echo "<th>Weight</th>";
				echo "<th>Goal Date</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['exercise'] . "</td>";
                echo "<td>" . $row['sets'] . "</td>";
                echo "<td>" . $row['reps'] . "</td>";
				echo "<td>" . $row['weight'] . "</td>";
				echo "<td>" . $row['date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
		echo "<a href=\"index.html\">New Lift</a>";
         // Close results
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>
</div>
</html>