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
			<h1 class="title">Reset Password</h1>
			<form data-target="<?= base_url('auth/reset_password');?>" method="post" id="login-form">

				<div class="input-container">
					<input type="password" name="password"/>
					<label for="password">New Password</label>
					<div class="bar"></div>
				</div>
				<div class="input-container">
					<input type="password" name="password_confirm"/>
					<label for="password">Confirm New Password</label>
					<div class="bar"></div>
				</div>
				<div class="button-container">
				<button type="submit" class="btn btn-lg btn-block waves-effect waves-light" name="btn-login">Reset</button>
				</div>

			</form>
			</div>
		</div>

	</div>
</section>
