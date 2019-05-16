<?php
/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "root", "", "workout");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs 
$Date = mysqli_real_escape_string($link, $_GET['date']);
$Exercise = mysqli_real_escape_string($link, $_GET['exercise']);
$Sets = mysqli_real_escape_string($link, $_GET['sets']);
$Reps = mysqli_real_escape_string($link, $_GET['reps']);
$Weight = mysqli_real_escape_string($link, $_GET['weight']);
 
// attempt insert query 
$sql = "INSERT INTO goals (exercise, sets, reps, weight, date) VALUES ('$Exercise', '$Sets', '$Reps', '$Weight', '$Date')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>