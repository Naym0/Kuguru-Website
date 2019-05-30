$(document).ready(() => {
	// ? datatable
	const datatable = $('.sys-admins-table').DataTable({
		ajax: {
			type: 'GET',
			url: `${baseURL}/admin/get_sys_admin_json`,
			dataSrc: ''
		},
		autoWidth: false,
		columns: [
			{ data: 'user_id' },
			{ data: 'email' },
			{ data: 'created_at' },
			// { data: 'last_access' },
			{ data: 'status' },
			{ data: 'verified' },
			{ data: 'actions' }
		],
		columnDefs: [
			{ targets: [0], visible: false, searchable: false },
			{ targets: [5], searchable: false, orderable: false }
		],
		scrollX: true
	});

	$(window).resize(() => {
		datatable.columns.adjust().draw();
	});
	// ?  add admin
	$('#add-admin-form').submit(event => {
		event.preventDefault();
		const _this = $(event.target);
		const dataTarget = `${baseURL}admin/create_sys_admin`;
		const dataToSend = _this.serializeArray();
		Codebase.blocks('#add-admin-block', 'state_loading');
		ajaxComm(dataTarget, dataToSend, 'json').done(res => {
			Codebase.blocks('#add-admin-block', 'state_normal');
			_this[0].reset();
			datatable.ajax.reload();
			datatable.columns.adjust().draw();
			const notificationIcon = res.ok
				? 'fa fa-info mt-10'
				: 'fa fa-warning mt-10';
			const notificationType = res.ok ? 'success' : 'danger';
			notify(notificationIcon, notificationType, res.msg);
		});
	});
	// ? suspend admin
	$('.sys-admins-table').on('click', '.btn-suspend', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const userId = rowData.user_id;

		// ? Get confirmation
		const toast = swal.mixin({
			buttonsStyling: false,
			customClass: {
				confirmButton: 'btn btn-lg btn-alt-success m-5',
				cancelButton: 'btn btn-lg btn-alt-danger m-5',
				input: 'form-control'
			}
		});
		toast
			.fire({
				title: 'Are you sure?',
				text: "The user won't be able to access the system",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d26a5c',
				confirmButtonText: 'Yes, suspend user',
				html: false,
				preConfirm: () => {
					return new Promise(resolve => {
						setTimeout(() => {
							resolve();
						}, 50);
					});
				}
			})
			.then(result => {
				if (result.value) {
					ajaxComm(
						`${baseURL}admin/suspend_sys_admin`,
						{ user_id: userId },
						'json'
					).done(res => {
						if (res.ok) {
							datatable.ajax.reload();
							datatable.columns.adjust().draw();
						}
						const notificationIcon = res.ok
							? 'fa fa-info mt-10'
							: 'fa fa-warning mt-10';
						const notificationType = res.ok ? 'success' : 'danger';
						notify(notificationIcon, notificationType, res.msg);
					});
				}
			});
	});

	// ? unsuspend admin
	$('.sys-admins-table').on('click', '.btn-unsuspend', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const userId = rowData.user_id;

		// ? Get confirmation
		const toast = swal.mixin({
			buttonsStyling: false,
			customClass: {
				confirmButton: 'btn btn-lg btn-alt-success m-5',
				cancelButton: 'btn btn-lg btn-alt-danger m-5',
				input: 'form-control'
			}
		});
		toast
			.fire({
				title: 'Are you sure?',
				text: 'The user will be able to access the system',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d26a5c',
				confirmButtonText: 'Yes, unsuspend user',
				html: false,
				preConfirm: () => {
					return new Promise(resolve => {
						setTimeout(() => {
							resolve();
						}, 50);
					});
				}
			})
			.then(result => {
				if (result.value) {
					ajaxComm(
						`${baseURL}admin/unsuspend_sys_admin`,
						{ user_id: userId },
						'json'
					).done(res => {
						if (res.ok) {
							datatable.ajax.reload();
							datatable.columns.adjust().draw();
						}
						const notificationIcon = res.ok
							? 'fa fa-info mt-10'
							: 'fa fa-warning mt-10';
						const notificationType = res.ok ? 'success' : 'danger';
						notify(notificationIcon, notificationType, res.msg);
					});
				}
			});
	});
});
