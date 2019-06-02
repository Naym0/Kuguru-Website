$(document).ready(() => {
	// ? datepicker
	$('.datepicker').datepicker({
		format: 'dd-MM-yyyy',
		autoclose: true,
		clearBtn: true,
		startDate: 'today'
	});

	// ?  submit new order
	const newOrderForm = $('#new-order-form');
	newOrderForm.submit(event => {
		event.preventDefault();
		const _this = $(event.target);
		const dataTarget = `${baseURL}customer/submit_new_order`;
		const dataToSend = _this.serializeArray();
		Codebase.blocks('#new-order-block', 'state_loading');
		ajaxComm(dataTarget, dataToSend, 'json').done(res => {
			Codebase.blocks('#new-order-block', 'state_normal');
			if (res.ok) {
				_this[0].reset();
			}
			const notificationIcon = res.ok
				? 'fa fa-info mt-10'
				: 'fa fa-warning mt-10';
			const notificationType = res.ok ? 'success' : 'danger';
			notify(notificationIcon, notificationType, res.msg);
		});
	});
});
