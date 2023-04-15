<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Demo</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <ul>
                <li><a style="text-decoration: none" href="index.html"> Home</a></li>
                <li><a class = "active" style="text-decoration: none" href="about.html"> About</a></li>
                <li><a style="text-decoration: none" href="contact.html">Contact</a></li>
            </ul>
        </header>
        <h1>Test Question Page</h1>
        <div class="page_alt">
                        <?php
                        // include as it requires connection
                        include '.connect.php';
                        // Retrieve questions from database
                        $sql = "SELECT * FROM quiz_questions";
                        $result = $conn->query($sql);

                        // Display questions and options in a form
                        if ($result->num_rows > 0) {
                                echo "<form method='post'>";
                                while($row = $result->fetch_assoc()) {
                                        echo "<p>" . $row["question_text"] . "</p>";
                                        echo "<input type='radio' name='question" . $row["question_id"] . "' value='answer1'>" . $row["answer1"] . "<br>";
                                        echo "<input type='radio' name='question" . $row["question_id"] . "' value='answer2'>" . $row["answer2"] . "<br>";
                                        echo "<input type='radio' name='question" . $row["question_id"] . "' value='answer3'>" . $row["answer3"] . "<br>";
                                        echo "<input type='radio' name='question" . $row["question_id"] . "' value='answer4'>" . $row["answer4"] . "<br><br>";
                                }
                                echo "<input type='submit' name='submit' value='Submit'>";
                                echo "</form>";
                        }
                            
                        // Process form submission 
                        // Display results
                        //      echo "<p>Thank you for taking the quiz. Result functionality pending. .</p>";
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