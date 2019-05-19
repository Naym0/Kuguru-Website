<?php
require FCPATH . 'vendor/autoload.php';

class MY_Email extends CI_Email
{
	public function send_email($to=array('name'=>null), $subject, $body, $from=array('name'=>'Kuguru Foods Complex Limited', 'email'=>'noreply'))
	{
		$email = new \SendGrid\Mail\Mail();
		$email->setFrom($from['email'].'@'.getenv('EMAIL_DOMAIN'), $from['name']);
		$email->setSubject($subject);
		$email->addTo($to['email'], $to['name']);
		$email->addContent("text/plain", strip_tags($body));
		$email->addContent("text/html",	$body);
		$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
		try {
			$response = $sendgrid->send($email);
			return $response->statusCode();
		} catch (Exception $e) {
			error_log($e->getMessage());
			return false;
		}
	}
}
