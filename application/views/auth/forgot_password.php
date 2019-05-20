<?php 
	if($this->session->flashdata('msg') !== NULL){
		echo $this->session->flashdata('msg')['content'];
	}
?>
<?= validation_errors('<div class="alert alert-danger" >', '</div>');?>

<section class="section-padding gray-bg">
	<div class="container"><br><br>

		<div class="login-wrapper">
			<div class="card-wrapper"></div>
			<div class="card-wrapper">
			<h1 class="title mb-0">Forgot Password?</h1>
			<div class="footer mt-0">A recovery link will be sent to your email address</div><br><br>
			<form action="<?= base_url('auth/forgot_password');?>" method="post" id="login-form">

				<div class="input-container">
					<input type="text" name="email"/>
					<label for="password">Email</label>
					<div class="bar"></div>
				</div>
				<div class="button-container">
				<button type="submit" class="btn btn-lg btn-block waves-effect waves-light" name="btn-login">Submit</button>
				</div>

			</form>
			</div>
		</div>

	</div>
</section>