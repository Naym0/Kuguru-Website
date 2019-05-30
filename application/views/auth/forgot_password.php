<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
	<div class="row mx-0 justify-content-center">
		<div class="hero-static col-lg-7 col-xl-7">
			<div class="content content-full overflow-hidden">
				<!-- Header -->
				<div class="py-30 text-center">
					<img src="<?= $cb->assets_folder . '/media/kuguru/kuguru-dark.png'; ?>" alt="" class="img-fluid">
				</div>
				<!-- END Header -->

				<form class="js-validation-signin" action="<?= base_url('auth/forgot_password'); ?>" method="post">
					<div class="block block-themed block-rounded block-shadow">
						<div class="block-header bg-gd-emerald">
							<h3 class="block-title">You will receive a password recovery email</h3>
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
									<input type="email" class="form-control" id="email" name="email">
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-sm-6 text-sm push pull-left">
									<button type="submit" class="btn btn-alt-success">
										Send recovery email
									</button>
								</div>
							</div>
						</div>
						<div class="block-content bg-body-light">
							<div class="form-group text-center">
								<a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="<?= base_url('auth/login'); ?>">
									<i class="fa fa-warning mr-5"></i> Remembered your password?
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
