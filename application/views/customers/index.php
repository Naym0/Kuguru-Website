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
				<a href="<?= base_url('new_order');?>" class="btn btn-primary">
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
					<!-- <th>Processed at</th> -->
					<!-- <th>Processed by</th> -->
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
