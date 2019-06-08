<!-- Page Content -->
<div class="content">
	<!-- Table block -->
	<div class="block block-bordered" id="list-employees-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">
				<span class="normal-message d-none">My orders</span>
				<span class="empty-message d-none">Let's start you off with your first order <i class="si si-paper-plane"></i></span>
			</h3>
			<div class="block-options">
				<a href="<?= base_url('new_order'); ?>" class="btn btn-primary">
					<i class="mr-5 fa fa-cart-plus"></i> New order
				</a>
			</div>
		</div>
		<div class="block-content d-none">
			<table class="table table-bordered table-striped table-vcenter dataTable customer-orders-table">
				<thead class="thead-dark">
					<th>ORDER ID</th>
					<th>Pick up location</th>
					<th>Pick up date</th>
					<th>Units</th>
					<th>Created at</th>
					<th>Status</th>
					<th>Actions</th>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- END Page Content -->

<!-- Order details modal -->
<div class="modal fade in show" id="order-details-modal" tabindex="-1" role="dialog" aria-labelledby="modal-extra-large" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="block block-themed block-transparent mb-0">
				<div class="block-header bg-primary-dark">
					<h3 class="block-title">ORDER DETAILS: <span class="text-info order_id_title"></span></h3>
					<div class="block-options">
						<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
							<i class="si si-close"></i>
						</button>
					</div>
				</div>
				<div class="block-content">
					<div class="row">
						<div class="col-md-6">
							<p class="h4">
								Status:
								<span class="text-info status text-uppercase"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="h4">
								Pickup location:
								<span class="text-info location_name"></span>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p class="h4">
								Product units:
								<span class="text-info product_units"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="h4">
								Created on:
								<span class="text-info created_at"></span>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p class="h4">
								Processed on:
								<span class="text-info processed_at"></span>
							</p>
						</div>
						<div class="col-md-6">
							<p class="h4">
								Processed by:
								<span class="text-info employee_last_name"></span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">
					<i class="si si-close mr-5"></i>Close
				</button>
			</div>
		</div>
	</div>
</div>
<!--END Order details modal -->
