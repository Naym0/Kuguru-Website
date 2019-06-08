<?php
function get_crypto_safe_token($length)
{
	$token = "";
	$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
	$codeAlphabet .= "0123456789";
	$max = strlen($codeAlphabet);

	for ($i = 0; $i < $length; $i++) {
		$token .= $codeAlphabet[random_int(0, $max - 1)];
	}

	return $token;
}


function get_action_html()
{
	return '<div class="btn-group" role="group" aria-label="Edit delete actions">
						<button type="button" class="btn btn-secondary btn-edit" title="Edit">
								<i class="fa fa-pencil"></i>
						</button>
						<button type="button" class="btn btn-danger btn-delete" title="Delete">
								<i class="fa fa-close"></i>
						</button>
					</div>';
}

function get_emp_order_action_html()
{
	return '<div class="btn-group" role="group">
						<button type="button" class="btn btn-secondary btn-view-more" title="View more">
							<i class="fa fa-eye"></i>
						</button>
						<button type="button" class="btn btn-danger btn-reject-order" title="Reject order">
								<i class="fa fa-close"></i>
						</button>
						<button type="button" class="btn btn-success btn-process-order" title="Process order">
								<i class="fa fa-check"></i>
						</button>
					</div>';
}

function get_emp_order_viewonly_html()
{
	return '<div class="btn-group" role="group">
						<button type="button" class="btn btn-secondary btn-view-more" title="View more">
								<i class="fa fa-eye"></i>
						</button>
					</div>';
}

function get_customer_order_action_html()
{
	return '<div class="btn-group" role="group" aria-label="Edit delete actions">
						<button type="button" class="btn btn-secondary btn-view-more" title="View more">
								<i class="fa fa-eye"></i>
						</button>
						<button type="button" class="btn btn-danger btn-cancel-order" title="Cancel order">
								<i class="fa fa-close"></i>
						</button>
					</div>';
}

function get_customer_viewonly_action_html()
{
	return '<div class="btn-group" role="group" aria-label="Edit delete actions">
						<button type="button" class="btn btn-secondary btn-view-more" title="View more">
								<i class="fa fa-eye"></i>
						</button>
					</div>';
}

function get_action_suspend_html()
{
	return '<div class="btn-group" role="group" aria-label="Edit delete actions">
	<button type="button" class="btn btn-secondary btn-edit" title="Edit">
			<i class="fa fa-pencil"></i>
	</button>
	<button type="button" class="btn btn-danger btn-suspend" title="Suspend">
			<i class="si si-ban"></i>
	</button>
</div>';
}

function get_action_unsuspend_html()
{
	return '<div class="btn-group" role="group" aria-label="Edit delete actions">
	<button type="button" class="btn btn-secondary btn-edit" title="Edit">
			<i class="fa fa-pencil"></i>
	</button>
	<button type="button" class="btn btn-success btn-unsuspend" title="Unsuspend">
			<i class="si si-magic-wand"></i>
	</button>
</div>';
}

function redirect_user($user_type)
{
	switch ($user_type) {
		case 'admin':
		case 'employee':
			redirect(base_url('dashboard/index'));
			break;
		case 'customer':
			redirect(base_url('customer'));
			break;
	}
}
