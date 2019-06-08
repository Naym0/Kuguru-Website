<!-- Page Content -->
<div class="content">
	<?php if ($this->session->userdata('user_type') === 'employee') : ?>
		<h3 class="content-title">Location: <span class="text-primary"><?= $this->session->userdata('employee_details')['location_name'];?></span></h3>
	<?php endif; ?>
	<?php if ($this->session->userdata('user_type') === 'admin') : ?>
		<!-- //?Admin only stats  -->
		<div class="row invisible" data-toggle="appear">
			<!-- Row #1 -->
			<div class="col-md-6">
				<a class="block block-link-shadow overflow-hidden" href="<?= base_url('locations') ?>">
					<div class="block-content block-content-full">
						<i class="si si-map fa-2x text-body-bg-dark"></i>
						<div class="row py-20">
							<div class="col-6 text-right border-r">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInLeft">
									<div class="font-size-h3 font-w600 text-info"><?= $location_stats['all']; ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Locations</div>
								</div>
							</div>
							<div class="col-6">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-success"><?= $location_stats['active']; ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Active</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a class="block block-link-shadow overflow-hidden" href="javascript:void(0)">
					<div class="block-content block-content-full">
						<div class="text-right">
							<i class="si si-users fa-2x text-body-bg-dark"></i>
						</div>
						<div class="row py-20">
							<div class="col-6 text-right border-r">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInLeft">
									<div class="font-size-h3 font-w600 text-info"><?= $user_stats['all_customers']; ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Customers</div>
								</div>
							</div>
							<div class="col-6">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-success"><?= $user_stats['active_customers_percentage']; ?>%</div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Active</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<!-- END Row #1 -->

			<!-- Row #2 -->
			<div class="col-md-6">
				<a class="block block-link-shadow overflow-hidden" href="<?= base_url('employees') ?>">
					<div class="block-content block-content-full">
						<i class="si si-users fa-2x text-body-bg-dark"></i>
						<div class="row py-20">
							<div class="col-6 text-right border-r">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInLeft">
									<div class="font-size-h3 font-w600 text-info"><?= $user_stats['all_employees']; ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Employees</div>
								</div>
							</div>
							<div class="col-6">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-success"><?= $user_stats['active_employees_percentage']; ?>%</div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Active</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a class="block block-link-shadow overflow-hidden" href="<?= base_url('system_admins') ?>">
					<div class="block-content block-content-full">
						<div class="text-right">
							<i class="si si-users fa-2x text-body-bg-dark"></i>
						</div>
						<div class="row py-20">
							<div class="col-6 text-right border-r">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInLeft">
									<div class="font-size-h3 font-w600 text-info"><?= $user_stats['all_admins']; ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Admins</div>
								</div>
							</div>
							<div class="col-6">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-success"><?= $user_stats['active_admins_percentage']; ?>%</div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Active</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<!-- END Row #2 -->

		</div>
		<!-- //?End Admin only stats  -->
	<?php endif; ?>

	<?php if (
		$this->session->userdata('user_type') === 'employee'
	) : ?>
		<!-- //? Personnel only stats -->
		<div class="row invisible" data-toggle="appear">
			<!-- Row #1 -->
			<div class="col-md-6">
				<a class="block block-link-shadow overflow-hidden" href="<?= base_url('locations') ?>">
					<div class="block-content block-content-full">
						<i class="fa fa-cart-arrow-down fa-2x text-body-bg-dark"></i>
						<span class="font-w600 font-size-h5 text-uppercase">orders</span>
						<div class="row py-20">
							<div class="col-3 text-right border-r">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInLeft">
									<div class="font-size-h3 font-w600"><?= with_default($order_stats['orders_summary'], 'all', '0'); ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">ALL</div>
								</div>
							</div>
							<div class="col-3">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-info"><?= with_default($order_stats['orders_summary'], 'pending', '0'); ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Pending</div>
								</div>
							</div>
							<div class="col-3">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-success"><?= with_default($order_stats['orders_summary'], 'complete', '0'); ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Complete</div>
								</div>
							</div>
							<div class="col-3">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-danger"><?= with_default($order_stats['orders_summary'], 'failed', '0'); ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Failed</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<a class="block block-link-shadow overflow-hidden" href="<?= base_url('locations') ?>">
					<div class="block-content block-content-full">
						<i class="fa fa-cart-arrow-down fa-2x text-body-bg-dark"></i>
						<span class="font-w600 font-size-h5 text-uppercase">orders today</span>
						<div class="row py-20">
							<div class="col-3 text-right border-r">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInLeft">
									<div class="font-size-h3 font-w600"><?= with_default($order_stats['orders_today'], 'all', '0'); ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">ALL</div>
								</div>
							</div>
							<div class="col-3">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-info"><?= with_default($order_stats['orders_today'], 'pending', '0'); ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Pending</div>
								</div>
							</div>
							<div class="col-3">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-success"><?= with_default($order_stats['orders_today'], 'complete', '0'); ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Complete</div>
								</div>
							</div>
							<div class="col-3">
								<div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
									<div class="font-size-h3 font-w600 text-danger"><?= with_default($order_stats['orders_today'], 'failed', '0'); ?></div>
									<div class="font-size-sm font-w600 text-uppercase text-muted">Failed</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<!-- END Row #1 -->
		</div>

		<div class="row invisible" data-toggle="appear">
			<!-- Row #2 -->
			<div class="col-md-6">
				<div class="block">
					<div class="block-header">
						<h3 class="block-title">
							Orders <small>This week</small>
						</h3>
						<div class="block-options">
							<button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
								<i class="si si-refresh"></i>
							</button>
						</div>
					</div>
					<div class="block-content block-content-full">
						<div class="pull-all">
							<!-- Lines Chart Container functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
							<!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
							<canvas data-records='<?= json_encode($order_stats['orders_this_week']) ?>' class="js-chartjs-dashboard-lines"></canvas>
						</div>
					</div>
				</div>
			</div>
			<!-- END Row #2 -->
		</div>
		<!-- //? End Personnel only stats -->
	<?php endif; ?>
</div>
<!-- END Page Content -->
