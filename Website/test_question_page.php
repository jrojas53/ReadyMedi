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
// include as it requires connection.
require_once 'config.php';

// from demo.php, setting up DB variables for later
$db = get_connection();
$query = $db->prepare("select * from quiz_questions WHERE id = ?");
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

	$option1 = $db->query("Select quiz_questions.answer1 from quiz_questions WHERE id = $i");
	$q1row = $option1->fetch_assoc();

	$option2 = $db->query("Select quiz_questions.answer2 from quiz_questions WHERE id = $i");
	$q2row = $option2->fetch_assoc();

	$option3 = $db->query("Select quiz_questions.answer3 from quiz_questions WHERE id = $i");
	$q3row = $option3->fetch_assoc();

	$option4 = $db->query("Select quiz_questions.answer4 from quiz_questions WHERE id = $i");
	$q4row = $option4->fetch_assoc();
*/

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

$i++;
$query->execute();
$result = $query->get_result();
$question_data = $result->fetch_all(MYSQLI_ASSOC);

$form->add_input( $question_data[0]["question_text"], array(
	'type'    => 'radio',
	'options' => array(
		'option1'     => $question_data[0]["answer1"] ,
		'option2'  	 => $question_data[0]["answer2"] ,
		'option3' => $question_data[0]["answer3"] ,
		'option4' => $question_data[0]["answer4"] , 
	)
) );

//}

/*
Create the form
*/

$form->build_form();

/*
 * Debugging
 */
echo '<pre>';
print_r( $_REQUEST );
echo '</pre>';
echo '<pre>';
print_r( $_FILES );
echo '</pre>';
?>
</body>
</html>