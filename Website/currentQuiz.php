<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>ReadyMedi | Quiz Time! (K-demo)</title>
		<h3>(Krissy's Test Demo)</h2>
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
        <h1>Demo Quiz</h1>
        <div class="page">
			<?php
				/*	Building off from Kristine's (me) demo.php
				 * check if connected to database
				 * include as it requires connection. */
				include '.connect.php';
				
				/* This var holds the query statement we would like to run in MariaDB
				 * We will count through all of the rows in the id column in demo_questions */
				$sql_quiz = "select count(question_ID) from demo_questions";
				
				/* if the result exists,
				 * $result stores the output from passing the query statement to MDB. */
				if ($result = $db->query($sql_quiz)) {
					
					/* $row stores the results PERMANENTALY to be used multiple times
					 * rather than just query() that only stores temporarily. */
					$row = $result->fetch_assoc();
					
					// store the number of rows received after counting.
					$questionCount = $row['count(question_ID)'];
					
	// *************** WILL NEED TO SANITIZE!!!!!!!!! ***************
					// post is calling array
					// action - will send to <>
					echo "<form method='post' action='currentQuiz.php'><br>\n";
					
					for ($i = 1; $i <= $questionCount; $i++) {
						
						//echo "SQL Statement: $sql_quiz<br>";
						$sql_quiz = "SELECT * FROM  demo_questions WHERE question_ID = $i";
						
						/* QUESTION: Why do we pass this same if-statement and $row a second time? 
						 * Optimization? */
						if ($result = $db->query($sql_quiz)) {
							//echo "Inside for-loop-if-statement.<br><br>";
							$row = $result->fetch_assoc();
							
							// load symptom name
							$symptom = $row[]
							
							// load question prompt
							$question = $row[question_text];
							echo "Question $i: $question<br>";
							
							// load answers
							$value1 = $row['answer1'];	// no
							$value2 = $row['answer2'];	// yes
							
							// print radio buttons for Yes and No
							echo "<input type='radio' name='answer$i' value='$value1'> $value1";	// answer$i is stored in an array
							echo "<input type='radio' name='answer$i' value='$symptom'> $value2";	// YES will store the symptom name
							echo "<br>";
							
							//-------------------------------------------------------------
							// Polling example start //
							// https://www.w3schools.com/php/php_ajax_poll.asp
						}
					}
					
					// RESULTS HERE
					
					
				}
				
				else {
					// uhuhuhuhuh
				}
				
				echo "<input type='submit' name='submit' value='Submit'>";
				echo "</form><br>\n";
				
				
				// Print out what the user's answers 
				for ($a = 1; $a <= $questionCount; $a++){
					$answerResult = 'answer'.$a;
					$tempSymptoms = $_POST[$answerResult];		// grab from array post with user's submitted answers
					echo "Temporary Symptoms: $tempSymptoms<br>\n";
				}
				
			?>
        </div>
		<!-- Footer Links --> 
        <div class ="footer">
            <a class = "active" style="text-decoration: none" href="demo.php">Demo</a>
            <a style="text-decoration: none" href="index.html"> Home</a></li>
            <a style="text-decoration: none" href="account.php"> Account</a></li>
            <a style="text-decoration: none" href="about.html"> About</a></li>
            <a style="text-decoration: none" href="contact.html"> Contact</a></li>
        </div>
    </body>
</html>

<!-- Alert box will pop-up after each refresh of the page --> 
<script type="text/javascript">
	/* Javascript Code
     * Similar to "toast", a pop-up message will
	 * appear saying whatever is inside the alert. */
    alert("This is Krissy's test demo of the quiz!");	
</script>

