<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();


if (!isset($_POST['name'])) {
    $errors['name'] = 'Please enter your name';
}
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
}
if (!isset($_POST['message'])) {
    $errors['message'] = 'Please enter your message';
}

if (!empty($errors)) {
    $errorOutput = '<div class="alert alert-danger alert-dismissible" role="alert">';
    $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    $errorOutput .= '<ul>';
    foreach ($errors as $key => $value) {
        $errorOutput .= '<li>'.$value.'</li>';
    }
    $errorOutput .= '</ul></div>';
    echo $errorOutput;
    die();
}


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$from = $email;
$to = '[email protected]';
$subject = 'Contact Form';
$body = "From: $name\n E-Mail: $email\n Message:\n $message";
$headers = "From: ".$from;


sleep(2);
mail($to, $subject, $body, $headers);

$result = '<div class="alert alert-success alert-dismissible" role="alert">';
$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
$result .= 'Thank You! I will be in touch';
$result .= '</div>';
echo $result;


die();

?>
