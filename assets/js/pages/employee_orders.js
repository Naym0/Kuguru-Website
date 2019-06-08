$(document).ready(() => {
	// ? datatable
	const datatable = $('.orders-table').DataTable({
		ajax: {
			type: 'GET',
			url: `${baseURL}/employee/get_all_location_orders`,
			dataSrc: ''
		},
		autoWidth: false,
		columns: [
			{ data: 'order_id_title' },
			{ data: 'collection_date' },
			{ data: 'product_units' },
			{ data: 'created_at' },
			{ data: 'processed_at' },
			{ data: 'employee_last_name' },
			{ data: 'status' },
			{ data: 'actions' }
		],
		columnDefs: [{ targets: [7], searchable: false, orderable: false }],
		scrollX: true
	});

	$(window).resize(() => {
		datatable.columns.adjust().draw();
	});

	// ? order details modal
	$('.orders-table').on('click', '.btn-view-more', event => {
		const _this = $(event.target);
		const tr = _this.closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		// Fill form with details
		Object.keys(rowData).forEach(fieldName => {
			$('#order-details-modal')
				.find(`.${fieldName}`)
				.text(rowData[fieldName]);
		});
		$('#order-details-modal').modal();
	});

	// ? reject order
	$('.orders-table').on('click', '.btn-reject-order', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const orderId = rowData.order_id;
		const newStatus = 'rejected';

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
				title: 'Are you sure you want to reject order?',
				text: "You can't reverse this action",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d26a5c',
				confirmButtonText: "Yes, I'm sure",
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
						`${baseURL}employee/update_order`,
						{
							order_id: orderId,
							new_status: newStatus
						},
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

	// ? process(accept) order
	$('.orders-table').on('click', '.btn-process-order', event => {
		const _this = event.target;
		const tr = $(_this).closest('tr');
		const rowIndex = datatable.row(tr).index();
		const rowData = datatable.rows(rowIndex).data()[0];
		const orderId = rowData.order_id;
		const newStatus = 'complete';

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
				title: 'Are you sure you want to complete order?',
				text: "You can't reverse this action",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d26a5c',
				confirmButtonText: "Yes, I'm sure",
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
						`${baseURL}employee/update_order`,
						{
							order_id: orderId,
							new_status: newStatus
						},
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
