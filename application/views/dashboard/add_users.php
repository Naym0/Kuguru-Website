<?php
if ($this->session->flashdata('msg') !== NULL) {
	echo $this->session->flashdata('msg')['content'];
}
echo validation_errors('<div class="alert alert-danger" >', '</div>');
?>

<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
	<div class="row mx-0 justify-content-center">
		<div class="hero-static col-lg-8 col-xl-8">
			<div class="content content-full overflow-hidden">

				<form class="js-validation-signup" action="<?= base_url('auth/create_account');?>" method="post">
					<div class="block block-themed block-rounded block-shadow">
						<div class="block-header bg-gd-emerald">
							<h3 class="block-title">Add new Users</h3>
						</div>
						<div class="block-content">
							<div class="form-group row">
								<div class="col-12">
									<label for="signup-username">First name</label>
									<input type="text" class="form-control" id="signup-username" name="first_name" placeholder="eg: John">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label for="signup-username">Last name</label>
									<input type="text" class="form-control" id="signup-username" name="last_name" placeholder="eg: Smith">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label for="signup-email">Email</label>
									<input type="email" class="form-control" id="signup-email" name="email" placeholder="eg: johnsmith@example.com">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label for="signup-email">User Type</label>
									<select class="form-control" id="user_type" name="user_type">
										<option value="0">Please select</option>
										<option value="admin">Admin</option>
										<option value="employee">Personnel</option>
									</select>
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-sm-9 text-sm push">
									<button type="submit" class="btn btn-alt-success">
										<i class="fa fa-plus mr-10"></i> Create Account
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- END Sign Up Form -->
			</div>
		</div>
	</div>
</div>
<!-- END Page Content -->
