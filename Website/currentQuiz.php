



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
				$sql = "select count(question_text) 
						from (select distinct question_text 
							from demo_questions inner join Illness_Symptoms 
								where demo_questions.question_ID = Illness_Symptoms.question_ID) 
						as questions";
						
				//echo "SQL statement for total question count: $sql <br>\n";
				
				/* if the result exists,
				 * $result stores the output from passing the query statement to MDB. */
				if ($result = $db->query($sql)) {
					
					/* $row stores the results PERMANENTALY to be used multiple times
					 * rather than just query() that only stores temporarily. */
					$row = $result->fetch_assoc();
					
					// store the number of rows received after counting.
					$questionCount = $row['count(question_text)'];
					//echo "count for question subquery: $questionCount<br>\n";
					
	// *************** WILL NEED TO SANITIZE!!!!!!!!! ***************
					// post is calling array
					// action - will send to <>
					echo "<form method='post' action='currentQuiz.php'><br>\n";
					
					// Print questions with radio buttons
					for ($i = 1; $i <= $questionCount; $i++) {
						
						//echo "<br>SQL Statement: $sql<br>\n";
						
						//$sql = "SELECT * FROM  demo_questions WHERE question_ID = $i";
						$sql = "Select question_text, answer1, answer2, name, sympid 
									from (select ROW_NUMBER() OVER (order by question_text) as count, question_text, answer1, answer2, name, sympid 
											from (select distinct question_text, answer1, answer2, name,sympid from demo_questions 
												inner join Illness_Symptoms 
											where demo_questions.question_ID = Illness_Symptoms.question_ID) as origin)
								as cool where count = $i;";
						
						//echo "Giant Row numberization for Unique questions: $sql<br>\n";
						
						if ($result = $db->query($sql)) {
							//echo "Inside for-loop-if-statement.<br><br>";
							$row = $result->fetch_assoc();
							
							// load question prompt
							$question = $row['question_text'];
							echo "Question $i: $question<br>";
							
							// load answers
							$value1 = $row['answer1'];	// no
							$value2 = $row['answer2'];	// yes
							
							$symptomValue = $row['sympid'];
							//echo "symptomValue: $symptomValue<br>\n";
							
							// print radio buttons for Yes and No
							echo "<input type='radio' name='answer$i' value='$value1'> $value1";		// answer$i is stored in an array
							echo "<input type='radio' name='answer$i' value='$symptomValue'> $value2";	// YES will store the symptom name
							echo "<br>";
							
							//-------------------------------------------------------------
							// Polling example start //
							// https://www.w3schools.com/php/php_ajax_poll.asp
						}
						
					}
					
				}
				
				else {
					// uhuhuhuhuh
				}
				
				// Submit button at the bottom of all the questions
				echo "<input type='submit' name='submit' value='Submit'>";
				echo "</form><br>\n";
				
				// Setup Symptom count <----------------
				$symptom_array = [];
				$symptom_array_index = 0;
				$symptom_string = '';
				
				// Print out what the user's answers 
				for ($a = 1; $a <= $questionCount; $a++){
					$answerResult = 'answer'.$a;
					$tempSymptoms = $_POST[$answerResult];		// grab from array post with user's submitted answers
					//echo "Temporary Symptoms: $tempSymptoms<br>\n";
					
					if ($tempSymptoms != 'No' && $tempSymptoms != NULL) {
						//$symptom_string = $symptom_string.$tempSymptoms;
						//echo "Symptom string current is this: $symptom_string<br>\n";
						
						$symptom_array[$symptom_array_index] = $tempSymptoms; // assign current index to the current symptom on counter
						
						//echo "Symptom array @ index $symptom_array_index: $tempSymptoms<br><br>\n";
				/*		
						// if at the start of the array, concatinate existing string with symptom
						if (ISSET($symptom_array_index[0]) && $symptom_array_index == 0) {
							$symptom_string = $symptom_string.$tempSymptoms;
							echo "new string: $symptom_string<br>\n";
						}
						
						// Otherwise, concatinate with a comma
						//else if ($symptom_array_index[$a] = NULL) {
						else {
							$symptom_string = $symptom_string.", ".$tempSymptoms;
							echo "new string2: $symptom_string<br>\n";
						}
				*/	
						$symptom_array_index++;
					}
				}
				
				//echo "<br>Symptom String = $symptom_string<br>\n";
				//echo "Array for symptoms\n";
				//print_r($symptom_array);
				//echo "<br>\n";
				
				// Setup Illness count <----------------
				$illness_array = [];
				$illness_array_index = 0;
				$illness_string = '';
				

				$symptom_count = count($symptom_array);
				//echo "count of total symptoms selected: $symptom_count<br>\n";

				for ($i = 0; $i < $symptom_count; $i++){

					$symptom_id = $symptom_array[$i];
					//echo "Symptom Name @ index $i = $symptom_id<br>\n";

					$sql = "select count(illid) as count from Illness_Symptoms where sympid = $symptom_id;";
					//echo "sql statment for count of potential illnessess: $sql<br>\n";

					if ($result = $db->query($sql)){

						$row = $result->fetch_assoc();

						$illness_total = $row['count'];
						//echo "Illess total: $illness_total<br>\n";

						for ($t = 1; $t <= $illness_total; $t++){

							$sql = "select illid from (select row_number() over (order by illid) as count, illid from Illness_Symptoms where sympid = '$symptom_id') as cool where count = $t;";
							//echo "SQL Statement: $sql<br>\n";

							if ($result = $db->query($sql)){

								$row = $result->fetch_assoc();

								$current_illness = $row['illid'];
								//echo "current illness: $current_illness<br>\n";

								$illness_array[$illness_array_index] = $current_illness;
								//echo "illness_array @ index $illness_array_index: $current_illness<br>\n";

								$illness_array_index++;
							}
						}
					}
				}

				//echo "Potential Illnesses array";
				//print_r($illness_array);
				//echo "<br>\n";

				$sorted_illness_array = array_count_values($illness_array);
				//echo "Sorted Illness Array";
				//print_r($sorted_illness_array);
				//echo "<br>\n";

				$max_percent = 0;
				$max_illness = '';

				foreach($sorted_illness_array as $illness => $illness_occurance){

					$sql = "select count(sympid) as count, Illness.name from Illness inner join Illness_Symptoms where Illness.illid = Illness_Symptoms.illid and Illness_Symptoms.illid = $illness;";
					//echo "count of total symptoms for illness: $sql<br>\n";

					if($result = $db->query($sql)) {
						$row = $result->fetch_assoc();
						$total_symptom_illness = $row['count'];
						$percent = round(($illness_occurance / $total_symptom_illness) * 100); 
						//echo "Illness $illness percentage: $percent<br>\n";


						//Get highest Symptom
						if ($percent > $max_percent) {
							$max_illness = $illness;
							$max_percent = $percent;
							$max_illness_name = $row['name'];
							
							//echo "Highest Illness: $max_illness<br>\n";
							//echo "Max percentage: $max_percent<br>\n";
							//echo "Max Illness Name: $max_illness_name<br><br>\n";
						}

					}
				}

				unset($symptom_string);

				for ($i = 0; $i < $symptom_count; $i++){

					$acquired_symptom = $symptom_array[$i];
					//echo "acquired symptom: $acquired_symptom<br>\n";

					$sql = "select name from Illness_Symptoms where sympid = '$acquired_symptom';";
					//echo "Sql: $sql<br>\n";

					if ($result = $db->query($sql)){

						$row = $result->fetch_assoc();

						$name = $row['name'];
						//echo "name: $name<br>\n";

						// if at the start of the array, concatinate existing string with symptom
						if (ISSET($symptom_array_index[0]) && $symptom_array_index == 0) {
							$symptom_string = $symptom_string.$name;
							//echo "new string: $symptom_string<br>\n";
						}
						
						// Otherwise, concatinate with a comma
						//else if ($symptom_array_index[$a] = NULL) {
						else {
							$symptom_string = ", ".$name.$symptom_string;
							//echo "new string2: $symptom_string<br>\n";
						}

					}
				}

				
				echo "Highest Illness: $max_illness<br>\n";
				echo "Max percentage: $max_percent<br>\n";
				echo "Max Illness Name: $max_illness_name<br><br>\n";
				echo "<br><br>Symptom Array: $symptom_string<br><br>\n";
				
		

				
				
				
				
				/*
				
				// ==========> Print out related illnesses <----------------
				for ($d = 1; $d <= $questionCount; $d++) {
					$answerResult = 'answer'.$d;
					$tempSymptoms = $_POST[$answerResult];		// grab from array post with user's submitted answers
					//echo "Temporary Symptoms: $tempSymptoms<br>\n";
					
					
					$illness_ID = $_POST[];
					echo "<br>Current Illness ID: $illness_ID<br>\n";
					
					//if ($tempSymptoms != 'No' && $tempSymptoms != NULL) {
					if ($) {
						
						//$illness_string = $illness_string.$tempSymptoms;
						//echo "Illness string current is this: $illness_string<br>\n";
						
						$symptom_array[$symptom_array_index] = $tempSymptoms; // assign current index to the current symptom on counter
						
						echo "Symptom array @ index $symptom_array_index: $tempSymptoms<br><br>\n";
						
						// if at the start of the array, concatinate existing string with symptom
						if (ISSET($symptom_array_index[0]) && $symptom_array_index == 0) {
							$symptom_string = $symptom_string.$tempSymptoms;
							echo "new string: $symptom_string<br>\n";
						}
						
						// Otherwise, concatinate with a comma
						//else if ($symptom_array_index[$a] = NULL) {
						else {
							$symptom_string = $symptom_string.", ".$tempSymptoms;
							echo "new string2: $symptom_string<br>\n";
						}
						
						$symptom_array_index++;
					}
                    }*/
				
				
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

<!--
<!-- Alert box will pop-up after each refresh of the page -> 
<script type="text/javascript">
	/* Javascript Code
     * Similar to "toast", a pop-up message will
	 * appear saying whatever is inside the alert. */
    alert("This is Krissy's test demo of the quiz!");	
</script>
-->
