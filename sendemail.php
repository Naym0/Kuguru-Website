<?php
require 'PHPMailer/PHPMailerAutoload.php';


try {
	$res = array();
	$subject = strip_tags($_POST['subject']);
	$email = strip_tags($_POST['email']);
	$phone = strip_tags($_POST['phone']);
	$name = strip_tags($_POST['name']);
	$message = nl2br(htmlspecialchars($_POST['message'], ENT_QUOTES));

	$empty = '';
	if (empty($name)) {
		$empty .= 'Name is required<br>';
	}

	if (empty($email)) {
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
		'{{email}}' => $email,
		'{{message}}' => $message,
		'{{name}}' => $name,
		'{{phone}}' => $phone
	);
	$templateContents = file_get_contents(dirname(__FILE__) . '/email-templates/' . $email_template);
	$contents = strtr($templateContents, $templateTags);

	$mail = new PHPMailer;
	// $mail->SMTPDebug = 2;
	$mail->isSMTP();                            // Set mailer to use SMTP
	$mail->Host = '';             // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                     // Enable SMTP authentication
	$mail->Username = '';   // SMTP username
	$mail->Password = '';        // SMTP password
	$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465; 
	$mail->SMTPOptions = array(
		'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
		)
);


	$mail->setFrom('noreply@events-designers.com', $name);
	$mail->addReplyTo($email, $name);
	$mail->addAddress('info@events-designers.com');          // Add a recipient

	$mail->Subject = $subject;
	$mail->Body    = $contents;
	$mail->IsHTML(true); 

	if (!$mail->send()) {
		throw new \Exception('Cann\'t send message.');
	}
	$res = array('ok' => true, 'msg' => '<strong>Thank You!</strong>&nbsp; Your email has been delivered.');
} catch (\Throwable $th) {
	$res = array('ok' => false, 'msg' => $th->getMessage());
} finally {
	echo json_encode($res);
	die();
}
