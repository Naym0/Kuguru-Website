<!-- Page Content -->
<div class="content">
	<div class="block block-bordered" id="add-admin-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">Add new system admin</h3>
			<div class="block-options">
				<button type="button" title="Toggle content" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
			</div>
		</div>
		<div class="block-content">
			<form id="add-admin-form" method="post">
				<div class="row items-push-2x">
					<div class="form-group col-md-6">
						<label>Email address</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group col-md-6 d-flex align-items-baseline flex-column">
						<input type="submit" value="Create system admin" class="btn btn-primary mt-auto">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="block block-bordered" id="list-admin-block">
		<div class="block-header block-header-default">
			<h3 class="block-title">System admins list</h3>
			<div class="block-options">
				<button type="button" title="Toggle content" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
			</div>
		</div>
		<div class="block-content">
			<table class="table table-bordered table-striped table-vcenter sys-admins-table">
				<thead class="thead-dark">
					<th>admin_id</th>
					<th>Email address</th>
					<th>Created at</th>
					<!-- <th>Last access</th> -->
					<th>Status</th>
					<th>Verified</th>
					<th>Actions</th>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-- END Page Content -->
