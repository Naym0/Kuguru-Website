<?php
session_start();
require 'vendor/autoload.php';
require 'env-setup.php';


try {
	$subject = strip_tags($_POST['subject']);
	$email_address = strip_tags($_POST['email']);
	$phone = strip_tags($_POST['phone']);
	$name = strip_tags($_POST['name']);
	$message = nl2br(htmlspecialchars($_POST['message'], ENT_QUOTES));

	$empty = '';
	if (empty($name)) {
		$empty .= 'Name is required<br>';
	}

	if (empty($email_address)) {
		$empty .=  'Email is required<br>';
	}

	if (empty($message)) {
		$empty .= 'Message is required<br>';
	}

	if (empty($subject)) {
		$empty .= 'Subject is required<br>';
	}

	if($empty !== '' || !empty($empty)) {
		throw new \Exception($empty);		
	}

	$email_template = 'simple.html';
	$templateTags = array(
		'{{subject}}' => $subject,
		'{{email}}' => $email_address,
		'{{message}}' => $message,
		'{{name}}' => $name,
		'{{phone}}' => $phone
	);
	$templateContents = file_get_contents(dirname(__FILE__) . '/email-templates/' . $email_template);
	$contents = strtr($templateContents, $templateTags);

	$email = new \SendGrid\Mail\Mail();
	$email->setFrom($email_address, $name);
	$email->setSubject($subject);
	$email->addTo('kamawanyee@gmail.com', "Kuguru Foods Complex Limited");
	$email->addContent("text/plain", strip_tags($contents));
	$email->addContent("text/html",	$contents);
	$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
	
	$response = $sendgrid->send($email);
	$response_code = $response->statusCode();
	
	if($response_code !== 202) throw new \Exception("Error code($response_code) :Could not send email.");	
	$res = array('type' => 'success', 'content' => 'Your inquiry has been sent');
} catch (\Throwable $th) {
	$res = array('type' => 'danger', 'content' => $th->getMessage());
} finally {
	$_SESSION['msg']=$res;
	header('Location: '.BASE_URL.'/pages/contact.php');
}
