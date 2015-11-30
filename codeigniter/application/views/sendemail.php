<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Email sent!'
	);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = $email;
    $email_to = 'andre1halim@gmail.com';

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email ."\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, 'Name:-'.$name."\n\n".'Email: '.$email."\n\n".'Message: '.$message, 'From: <'.$email_from.'>');
    /*if ($success){
        echo 
    }*/
    echo json_encode($status);
    die;