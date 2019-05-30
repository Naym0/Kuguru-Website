<?php
/**
 * backend/views/inc_sidebar.php
 *
 * Author: pixelcave
 *
 * The sidebar of each page
 *
 */
?>

<!-- Sidebar -->
<!--
    Helper classes

    Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
    Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

    Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
    Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
        - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
-->
<nav id="sidebar">
	<!-- Sidebar Content -->
	<div class="sidebar-content">
		<!-- Side Header -->
		<div class="content-header content-header-fullrow px-15 border-bottom">
			<!-- Normal Mode -->
			<div class="content-header-section text-center align-parent sidebar-mini-hidden">
				<!-- Close Sidebar, Visible only on mobile screens -->
				<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
				<button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
					<i class="fa fa-times text-danger"></i>
				</button>
				<!-- END Close Sidebar -->

				<!-- Logo -->
				<div class="content-header-item">
					<a class="link-effect font-w700" href="<?= base_url('dashboard/'); ?>">
						<!-- <i class="si si-fire text-primary"></i> -->
						<span class="font-size-xl text-dual-primary-dark">Kuguru</span><span class="font-size-xl text-primary">Foods</span>
					</a>
				</div>
				<!-- END Logo -->
			</div>
			<!-- END Normal Mode -->
		</div>
		<!-- END Side Header -->

		<!-- Side Navigation -->
		<div class="content-side content-side-full">
			<ul class="nav-main">
				<?php $cb->build_nav(); ?>
			</ul>
		</div>
		<!-- END Side Navigation -->
	</div>
	<!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
