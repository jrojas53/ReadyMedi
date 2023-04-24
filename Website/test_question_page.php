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
	<title>PHPFormBuilder test</title>
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
        <div class="page_alt">

<?php
// include as it requires connection.
include '.connect.php';

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
$form->set_att('enctype', 'multipart/form-data');
$form->set_att('markup', 'html');
$form->set_att('class', 'class_1');
$form->set_att('class', 'class_2');
$form->set_att('id', 'a_contact_form');
$form->set_att('novalidate', true);
$form->set_att('add_honeypot', true);
$form->set_att('add_nonce', 'a_contact_form');
$form->set_att('form_element', true);
$form->set_att('add_submit', true);


/*
Uss add_input to create form fields
First argument is the name
Second argument is an array of arguments for the field
Third argument is an alternative name field, if needed
*/
$form->add_input( 'Bad Headline', array(
	
	'type'    => 'radio',
	'options' => array(
		'say_hi_2'     => 'Just saying hi! 2',
		'complain_2'   => 'I have a bone to pick 2',
		'offer_gift_2' => 'I\'d like to give you something neat 2',
	)
) );


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