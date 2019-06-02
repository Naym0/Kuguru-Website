<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
	<div class="row mx-0 justify-content-center">
		<div class="hero-static col-lg-7 col-xl-7">
			<div class="content content-full overflow-hidden">
				<!-- Header -->
				<div class="py-5 text-center">
					<img src="<?= $cb->assets_folder . '/media/kuguru/kuguru-dark.png'; ?>" alt="" class="img-fluid">
				</div>
				<!-- END Header -->

				<!-- Sign Up Form -->
				<form id="create-account-form" method="post">
					<div class="block block-themed block-rounded block-shadow" id="create-account-block">
						<div class="block-header bg-gd-emerald">
							<h3 class="block-title">Create customer account</h3>
						</div>
						<div class="block-content">
							<!-- //? Flashdata messages -->
							<?php if ($this->session->flashdata('msg') !== NULL) : ?>
								<div class="alert alert-<?= $this->session->flashdata('msg')['type'] ?> alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<?= $this->session->flashdata('msg')['content']; ?>
								</div>
							<?php endif; ?>
							<?= validation_errors('<div class="alert alert-danger alert-dismissible" ><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>', '</div>'); ?>
							<div class="form-group row">
								<div class="col-12">
									<label for="login-username">Email address</label>
									<input type="email" class="form-control" id="email" name="email" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label for="login-password">Password</label>
									<input type="password" class="form-control" id="password" name="password" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label for="login-password">Confirm Password</label>
									<input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-sm-12 d-flex justify-content-end text-sm push">
									<button type="submit" class="btn btn-alt-success">
										Create account
									</button>
								</div>
							</div>
						</div>
						<div class="block-content bg-body-light">
							<div class="form-group text-center">
								Already have an account?
								<a class="link-effect text-primary font-w700 mr-10 mb-5 d-inline-block" href="<?= base_url('auth/login'); ?>">
									Login
								</a>
							</div>
						</div>
					</div>
				</form>
				<!-- END Sign In Form -->
			</div>
		</div>
	</div>
</div>
<!-- END Page Content -->
