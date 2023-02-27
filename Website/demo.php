<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Demo</title>
        <style>
            body {
                background-image: url("summer_background_gradient.jpg");
                background-size: cover;
	            background-position: center center;
	            background-attachment: fixed;                
            }
            h1 {
                text-align: center; 
                font-family: Tahoma, sans-serif; 
                color: white; 
                font-size: 80px; 
                text-shadow: 2px 2px 5px gray; 
                margin: 0%;
            }
            h2 {
                text-align: center; 
                font-family: Tahoma, sans-serif; 
                color: black; 
                text-shadow: 2px 2px 5px wheat;
                font-size: 50px; 
                margin: 0%;
            }
            ul  {
                list-style-type: none;
                margin: auto;
                border: 0;
                padding: 0;
                top: 0;
                overflow: hidden;
                font-family: Tahoma, sans-serif;
            }
            li {
                float: left;
                margin-left: 20px;
            }
            li a {
                display: block;
                color: lightgray;
                text-align: center;
                padding: 15px;
                font-size: 20px;
            }
            li a:hover:not(.active) {
                color: white;
            }
            .active {
                color: white;
            }
            .page {
                height: 650px;
                width: 100%;
                background-color: white;
                opacity: 50%;
                overflow: auto;
            }
            .statement {
                margin: auto;
                padding-top: 60px;
                text-align: center;
                font-family: Tahoma, sans-serif;
                font-size: 35px;
                text-shadow: 2px 2px 5px ghostwhite;                
            }
            .footer {
                overflow: hidden;
                text-align: right;
            }
        </style>
    </head>
    <body>
        <header>
            <ul>
                <li><a style="text-decoration: none" href="index.html"> Home</a></li>
                <li><a class = "active" style="text-decoration: none" href="about.html"> About</a></li>
                <li><a style="text-decoration: none" href="contact.html">Contact</a></li>
            </ul>
        </header>        
        <h1>Demo</h1>
        <div class="page">
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
        </div>
        <div class ="footer">
            <a class = "active" style="text-decoration: none" href="demo.php">Demo</a>
            <a style="text-decoration: none" href="index.html"> Home</a></li>
            <a style="text-decoration: none" href="account.php"> Account</a></li>
            <a style="text-decoration: none" href="about.html"> About</a></li>
            <a style="text-decoration: none" href="contact.html"> Contact</a></li>
        </div>
    </body>
</html>