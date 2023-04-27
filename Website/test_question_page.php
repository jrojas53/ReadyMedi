<?php

// included with the PHP form builder at https://github.com/joshcanhelp/php-form-builder
// probably will use this for debugging and such


ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Health Scan</title>
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
        <h1>Health Scan</h1>
        <div class="page_alt">

<?php
// used for calculating results, demo function
function checkIllness($hasEyeInfection, $hasEyePain, $hasRashOrHives, $hasTendernessInFace, $hasDiarrhea, $hasRunnyNose, $hasBodyAches, $hasCough, $hasFever, $hasShortnessOfBreath, $hasVomiting, $hasNausea, $hasHeadache, $hasFatigue, $light_sens, $head_side_throb) {
    
	if (0) { 
   	}
    elseif($hasEyeInfection == true && $hasEyePain == true || $hasEyeInfection == false && $hasEyePain == true || $hasEyeInfection == true && $hasEyePain == false) {
  		 return "You have pink eye.";	
	}
    // Check if the user has allergies
     elseif($hasEyePain == false && $hasRashOrHives == true && $hasTendernessInFace == true && $hasDiarrhea == false && ($hasRunnyNose == true || $hasRunnyNose == false)) {
        return "You have allergies.";
    }
    // Check if the user has flu
    elseif ($hasRunnyNose == true && $hasBodyAches == true && $hasCough == true && $hasFever == true && ($hasShortnessOfBreath == true || $hasShortnessOfBreath == false) && ($hasVomiting == true || $hasVomiting == false) && ($hasNausea == true || $hasNausea == false) && ($hasHeadache == true || $hasHeadache == false) && ($hasFatigue == false)) {
        return "You have the flu.";
    }
    // Check if the user has migraine
    elseif (($hasFatigue == true || $hasFatigue == false) && ($hasVomiting == true || $hasVomiting == false) && ($hasNausea == true || $hasNausea == false) && ($hasHeadache == true || $hasHeadache == false) && $light_sens == true && $head_side_throb == true) {
        return "You have migraine.";
    }
    else {
    	return "Sorry your information does not match any known illnesses in our database. Please see a doctor at your earliest convenience.";
    }
}

// include as it requires connection.
require_once 'config.php';

// from demo.php, setting up DB variables for later
$db = get_connection();
$query = $db->prepare("select * from demo_questions WHERE id = ?");
$i = 1;
$query->bind_param("i", $i);
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);
// print_r($question_data);
// echo $question_data[0]["answer1"];


require_once( 'PhpFormBuilder.php' );

/*
Create a new instance
Pass in a URL to set the action
*/
$form = new PhpFormBuilder();

/*
Form attributes are modified with the set_att function.
First argument is the setting
Second argument is the value
*/

$form->set_att('method', 'post');
//$form->set_att('enctype', 'multipart/form-data');
//$form->set_att('markup', 'html');
//$form->set_att('class', 'class_1');
//$form->set_att('class', 'class_2');
//$form->set_att('id', 'a_contact_form');
//$form->set_att('novalidate', true);
//$form->set_att('add_honeypot', true);
//$form->set_att('add_nonce', 'a_contact_form');
//$form->set_att('form_element', true);
//$form->set_att('add_submit', true);


/*
Uss add_input to create form fields
First argument is the name
Second argument is an array of arguments for the field
Third argument is an alternative name field, if needed
*/

// iterate for as many questions as there are
/* for ($i = 1; $i <= $times; $i++){
	// gets the quiz question based on its iteration and puts it into $text
	$text = $db->query("Select quiz_questions.question_text from quiz_questions WHERE id = $i");
	$textrow = $text->fetch_assoc();

	$0 = $db->query("Select quiz_questions.answer1 from quiz_questions WHERE id = $i");
	$q1row = $0->fetch_assoc();

	$1 = $db->query("Select quiz_questions.answer2 from quiz_questions WHERE id = $i");
	$q2row = $1->fetch_assoc();

	$option3 = $db->query("Select quiz_questions.answer3 from quiz_questions WHERE id = $i");
	$q3row = $option3->fetch_assoc();

	$option4 = $db->query("Select quiz_questions.answer4 from quiz_questions WHERE id = $i");
	$q4row = $option4->fetch_assoc();
*/

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q1" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q2" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q3" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q4" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q5" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q6" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q7" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q8" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q9" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q10" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q11" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q12" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q13" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q14" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q15" );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'required' => true,
	'type'    => 'radio',
	'options' => array(
		'0'     => $question_data[0]["answer1"] ,
		'1'  	 => $question_data[0]["answer2"] ,
	)
), "q16" );

//}

/*
Create the form
*/

$form->build_form();

// mismatched due to communication error. right most comments indicate the order that each question must corr. to
$q1 = $_POST["q1"];  // eye infection
$q2 = $_POST["q2"];	// eye pain
$q3 = $_POST["q3"];	// rash&hives
$q4 = $_POST["q4"];	// face tenderness
$q5 = $_POST["q5"];	// diarrhea
$q6 = $_POST["q6"];	// runny nose
$q7 = $_POST["q7"];	// body aches
$q8 = $_POST["q8"];	// cough
$q9 = $_POST["q9"]; // fever
$q10 = $_POST["q10"];	// shortness of breath
$q11 = $_POST["q13"];	// vomiting
$q12 = $_POST["q14"];	// nausea
$q13 = $_POST["q15"];	// headache
$q14 = $_POST["q12"];	// fatigue
$q15 = $_POST["q16"];	// light sensitivity
$q16 = $_POST["q11"];	// head throb. mismatched indexes because of miscommunication on building the calculate function.

echo "\n\n";
// calculates result based on input. Not the most efficient thing ever.
echo checkIllness($q1[0], $q2[0], $q3[0], $q4[0], $q5[0], $q6[0], $q7[0], $q8[0], $q9[0], $q10[0], $q11[0], $q12[0], $q13[0], $q14[0], $q15[0], $q16[0]);


// echo $q1[0]; debugging line, spits out "0" or "1"

/*
 * Debugging
 
echo '<pre>';
print_r( $_REQUEST );
echo '</pre>';
echo '<pre>';
print_r( $_FILES );
echo '</pre>';
*/
?>
</body>
</html>