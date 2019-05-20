<?php
if ($this->session->flashdata('msg') !== NULL) {
	echo $this->session->flashdata('msg')['content'];
}
echo validation_errors('<div class="alert alert-danger" >', '</div>');
?>

<section class="section-padding gray-bg">
	<div class="container"><br><br>
	<a href=<?= base_url('auth/login');?> class="pull-right"> Logout ||</a>
	<a href=<?= base_url('dashboard/index');?> class="pull-right mr-10">|| Received orders ||</a>


		<div class="login-wrapper">
			<div class="card-wrapper"></div>
			<div class="card-wrapper">
				<h1 class="title">Add Users</h1>
				<form action="<?= base_url('Auth/create_account');?>" method="post" id="login-form">
					<div class="input-container">
						<input type="text" name="first_name"/>
						<label for="username">First name</label>
						<div class="bar"></div>
					</div>
					<div class="input-container">
						<input type="text" name="last_name"/>
						<label for="lname">Last Name</label>
						<div class="bar"></div>
					</div>
					<div class="input-container">
						<input type="text" name="email"/>
						<label for="email">Email</label>
						<div class="bar"></div>
					</div>
					<div class="input-container">
						<input type="text" name="user_type"/>
						<label for="type">User Type</label>
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
