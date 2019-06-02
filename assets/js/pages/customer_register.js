$(document).ready(() => {
	// ? form validation
	const createAccountForm = $('#create-account-form');
	initDefaultValidator();
	const validator = createAccountForm.validate({
		rules: {
			email: {
				remote: {
					url: `${baseURL}customer/validate_email`,
					type: 'post',
					data: { email: () => createAccountForm.find('[name="email"]').val() },
					dataType: 'json'
				}
			},
			password: {
				minlength: 8
			},
			confirm_password: {
				equalTo: '#password'
			}
		},
		messages: {
			password: { minlength: 'Password requires a minimum of 8 characters' },
			confirm_password: { equalTo: "Passwords don't match" }
		}
	});

	// ? create account
	createAccountForm.submit(event => {
		event.preventDefault();
		if (!validator.valid()) return false;
		const _this = $(event.target);
		const dataTarget = `${baseURL}customer/create_account_process`;
		const dataToSend = _this.serializeArray();
		Codebase.blocks('#create-account-block', 'state_loading');
		ajaxComm(dataTarget, dataToSend, 'json').done(res => {
			Codebase.blocks('#create-account-block', 'state_normal');
			if (res.ok) {
				_this[0].reset();
			}
			const notificationIcon = res.ok
				? 'fa fa-info mt-10'
				: 'fa fa-warning mt-10';
			const notificationType = res.ok ? 'success' : 'danger';
			notify(notificationIcon, notificationType, res.msg);
		});
		return true;
	});
});
