<?php
// Set database connection parameters
$servername = "localhost";
$username = "readymedi";
$password = "Duc44Cpuzf";
$dbname = "readymedi";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve questions from database
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);

// Display questions and options in a form
if ($result->num_rows > 0) {
    echo "<form method='post'>";
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row["question_text"] . "</p>";
        echo "<input type='radio' name='question" . $row["question_id"] . "' value='" . $row["option1_weight"] . "'>" . $row["option1"] . "<br>";
        echo "<input type='radio' name='question" . $row["question_id"] . "' value='" . $row["option2_weight"] . "'>" . $row["option2"] . "<br>";
        echo "<input type='radio' name='question" . $row["question_id"] . "' value='" . $row["option3_weight"] . "'>" . $row["option3"] . "<br>";
        echo "<input type='radio' name='question" . $row["question_id"] . "' value='" . $row["option4_weight"] . "'>" . $row["option4"] . "<br><br>";
    }
    echo "<input type='submit' name='submit' value='Submit'>";
    echo "</form>";
}

// Process form submission
if (isset($_POST["submit"])) {
    // Calculate score
    $score = 0;
    $max_score = 0;
    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $max_score += $row["max_weight"];
        if ($_POST["question" . $row["question_id"]] == $row["likely_option_weight"]) {
            $score += $row["likely_weight"];
        } else if ($_POST["question" . $row["question_id"]] != NULL) {
            $score -= $row["penalty_weight"];
        }
    }
    $score = max($score, 0);
    // Display score
    echo "<p>Your score is " . $score . " out of " . $max_score . ".</p>";
}

// Close database connection
$conn->close();
?>

