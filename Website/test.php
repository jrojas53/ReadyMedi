<?php

// check if connected to database
// include as it requires connection.
include '.connect.php';

// This var holds the query statement we would like to run in MariaDB
// The ';' is not required as php sanitizes itself.
$sql_statement = "Select * from Illness";

// $result stores the output from passing the query statement to MDB.
$result = $db->query($sql_statement);

// $row stores the results PERMANENTALY to be used multiple times
// rather than just query() that only stores temporarily.
$row = $result->fetch_assoc();

// num_rows is a keyword from php? that will store the number of rows received.
$times = $result->num_rows;

//echo "number of rows " . $result->num_rows;
//echo "id: " . $row["illid"] . "- name: " . $row["name"] ."- description: " . $row[description];

for ($i = 1; $i <= $times; $i++){
	
	// store new query statement depending on row $i
	$test = "select * from Illness where illid = $i";
	//echo "$test\n";
	
	// Grab results from the row we're requesting from.
	$result = $db->query($test);
	$row = $result->fetch_assoc();
	
	// pass collumn name into $row[] to print the wanted info.
	echo "Illness ID: " . $row["illid"] . "\n" . "Illness Name: " . $row["name"] ."\n" . "Illness Description: " . $row["description"] . "\n\n";
}
?>

