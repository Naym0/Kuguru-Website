<?php
/**
 * backend/views/inc_side_overlay.php
 *
 * Author: pixelcave
 *
 * The side overlay of each page
 *
 */
?>
<!-- Side Overlay-->
<aside id="side-overlay">
	<!-- Side Header -->
	<div class="content-header content-header-fullrow">
		<div class="content-header-section align-parent">
			<!-- Close Side Overlay -->
			<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
			<button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
				<i class="fa fa-times text-danger"></i>
			</button>
			<!-- END Close Side Overlay -->

			<!-- User Info -->
			<div class="content-header-item">
				<a class="img-link mr-5" href="#">
					<?php $cb->get_avatar('15', '', 32, false); ?>
				</a>
				<a class="align-middle link-effect text-primary-dark font-w600" href="#">John Smith</a>
			</div>
			<!-- END User Info -->
		</div>
	</div>
	<!-- END Side Header -->

	<!-- Side Content -->
	<div class="content-side">
		<!-- Profile -->
		<div class="block pull-r-l">
			<div class="block-header bg-body-light">
				<h3 class="block-title">
					<i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Profile
				</h3>
				<div class="block-options">
					<button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
				</div>
			</div>
			<div class="block-content">
				<form action="be_pages_dashboard.php" method="post" onsubmit="return false;">
					<div class="form-group mb-15">
						<label for="side-overlay-profile-name">Name</label>
						<div class="input-group">
							<input type="text" class="form-control" id="side-overlay-profile-name" name="side-overlay-profile-name" placeholder="Your name.." value="John Smith">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fa fa-user"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group mb-15">
						<label for="side-overlay-profile-email">Email</label>
						<div class="input-group">
							<input type="email" class="form-control" id="side-overlay-profile-email" name="side-overlay-profile-email" placeholder="Your email.." value="john.smith@example.com">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fa fa-envelope"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group mb-15">
						<label for="side-overlay-profile-password">New Password</label>
						<div class="input-group">
							<input type="password" class="form-control" id="side-overlay-profile-password" name="side-overlay-profile-password" placeholder="New Password..">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fa fa-asterisk"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group mb-15">
						<label for="side-overlay-profile-password-confirm">Confirm New Password</label>
						<div class="input-group">
							<input type="password" class="form-control" id="side-overlay-profile-password-confirm" name="side-overlay-profile-password-confirm" placeholder="Confirm New Password..">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fa fa-asterisk"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-6">
							<button type="submit" class="btn btn-block btn-alt-primary">
								<i class="fa fa-refresh mr-5"></i> Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- END Profile -->
	</div>
	<!-- END Side Content -->
</aside>
<!-- END Side Overlay -->
