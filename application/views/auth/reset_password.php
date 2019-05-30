<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
	<div class="row mx-0 justify-content-center">
		<div class="hero-static col-lg-8 col-xl-6">
			<div class="content content-full overflow-hidden">
				<!-- Header -->
				<div class="py-30 text-center">
					<img src="<?= $cb->assets_folder . '/media/kuguru/kuguru-dark.png'; ?>" alt="" class="img-fluid">
				</div>
				<!-- END Header -->

				<form class="js-validation-signin" action="<?= $reset_password_url;?>" method="post">
					<div class="block block-themed block-rounded block-shadow">
						<div class="block-header bg-gd-emerald">
							<h3 class="block-title">Reset your password</h3>
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
									<label>Password</label>
									<input type="password" class="form-control" id="password" name="password">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label for="login-password">Confirm Password</label>
									<input type="password" class="form-control" id="password" name="password_confirm">
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-12 text-sm push">
									<button type="submit" class="btn btn-alt-success">
										Set new password
									</button>
								</div>
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
