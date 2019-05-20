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
				<h1 class="title">Admin Login</h1>
				<form action="<?= base_url('auth/login');?>" method="post" id="login-form">
					<div class="input-container">
						<input type="text" name="email"/>
						<label for="username">Username</label>
						<div class="bar"></div>
					</div>
					<div class="input-container">
						<input type="password" name="password"/>
						<label for="password">Password</label>
						<div class="bar"></div>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-lg btn-block waves-effect waves-light" name="btn-login">Login</button>
					</div>
					<div class="footer"><a href="#">Forgot your password?</a></div>
				</form>
			</div>
		</div>

	</div>
</section>