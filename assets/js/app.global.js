/* eslint-disable no-unused-vars */
function initDefaultValidator() {
	$.validator.setDefaults({
		debug: true,
		ignore: ':hidden,.select2-search__field',
		errorClass: 'invalid-feedback animated fadeInDown',
		errorElement: 'div',
		errorPlacement(error, e) {
			jQuery(e)
				.parents('.form-group')
				.append(error);
		},
		highlight(e) {
			jQuery(e)
				.closest('.form-group')
				.removeClass('is-invalid')
				.addClass('is-invalid');
		},
		success(e) {
			jQuery(e)
				.closest('.form-group')
				.removeClass('is-invalid');
			jQuery(e).remove();
		}
	});
}

function notify(icon, type, message, url, align) {
	// Create notification
	$.notify(
		{
			// options
			icon: icon || '',
			message,
			url: url || ''
		},
		{
			// settings
			element: 'body',
			type: type || 'info',
			allow_dismiss: true,
			newest_on_top: true,
			showProgressbar: false,
			placement: {
				from: 'top',
				align: align || 'right'
			},
			mouse_over: 'pause',
			offset: 20,
			spacing: 10,
			z_index: 1150,
			delay: 6000,
			template:
				'<div data-notify="container" class="notification alert alert-{0}" role="alert">' +
				'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
				'<span data-notify="icon"></span> ' +
				'<span data-notify="title">{1}</span> ' +
				'<span data-notify="message">{2}</span>' +
				'<div class="progress" data-notify="progressbar">' +
				'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
				'</div>' +
				'<a href="{3}" target="{4}" data-notify="url"></a>' +
				'</div>',
			animate: {
				enter: 'animated fadeIn',
				exit: 'animated fadeOutDown'
			},
			onShow() {
				this.css({ width: 'auto', height: 'auto' });
			}
		}
	);
}

function ajaxComm(dataTarget, dataSend, dataType) {
	return $.ajax({
		url: dataTarget,
		type: 'POST',
		data: dataSend,
		dataType
	}).fail(error => {
		const icon = 'fa fa-warning';
		notify(icon, 'danger', 'Error in server connection');
		console.log(error);
	});
}
