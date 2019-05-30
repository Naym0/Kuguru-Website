<?php
/**
 * backend/views/inc_header.php
 *
 * Author: pixelcave
 *
 * The header of each page
 *
 */
?>

<!-- Header -->
<header id="page-header">
	<!-- Header Content -->
	<div class="content-header">
		<!-- Left Section -->
		<div class="content-header-section">
			<!-- Toggle Sidebar -->
			<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
			<button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
				<i class="fa fa-navicon"></i>
			</button>
			<!-- END Toggle Sidebar -->
		</div>
		<!-- END Left Section -->
		<!-- Right Section -->
		<div class="content-header-section">
			<!-- User Dropdown -->
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-user d-sm-none"></i>
					<span class="d-none d-sm-inline-block">
						<?= $this->session->userdata('email');?>
					</span>
					<i class="fa fa-angle-down ml-5"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
					<h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
					<!-- Toggle Side Overlay -->
					<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
					<a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
						<i class="si si-user mr-5"></i> Profile
					</a>
					<!-- END Side Overlay -->

					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url('auth/logout');?>">
						<i class="si si-logout mr-5"></i> Sign Out
					</a>
				</div>
			</div>
			<!-- END User Dropdown -->

			<a href="<?= base_url('auth/logout');?>" class="btn btn-alt-primary">
				<i class="si si-logout mr-5"></i>Logout
			</a>
		</div>
		<!-- END Right Section -->
	</div>
	<!-- END Header Content -->
</header>
<!-- END Header -->
