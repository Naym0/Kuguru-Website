<?php
/**
 * backend/config.php
 *
 * Author: pixelcave
 *
 * Backend pages configuration file
 *
 */

// **************************************************************************************************
// INCLUDED VIEWS
// **************************************************************************************************

$cb->inc_side_overlay           = 'inc/backend/views/inc_side_overlay.php';
$cb->inc_sidebar                = 'inc/backend/views/inc_sidebar.php';
$cb->inc_header                 = 'inc/backend/views/inc_header.php';
$cb->inc_footer                 = 'inc/backend/views/inc_footer.php';


// **************************************************************************************************
// MAIN MENU
// **************************************************************************************************

$cb->main_nav                   = array(
	array(
		'name'  => '<span class="sidebar-mini-hide">Dashboard</span>',
		'icon'  => 'si si-home',
		'url'   => base_url('dashboard')
	),
	array(
		'name'  => '<span class="sidebar-mini-hide">Orders</span>',
		'icon'  => 'si si-basket',
		'url'   => base_url('orders')
	),
	array(
		'name'  => '<span class="sidebar-mini-hide">Locations</span>',
		'icon'  => 'si si-map',
		'url'   => base_url('locations')
	),
	array(
		'name'  => '<span class="sidebar-mini-hide">USER MANAGEMENT</span>',
		'type'  => 'heading',
	),
	array(
		'name'  => '<span class="sidebar-mini-hide">Employees</span>',
		'icon'  => 'si si-users',
		'url'   => base_url('employees')
	),
	array(
		'name'  => '<span class="sidebar-mini-hide">System admins</span>',
		'icon'  => 'si si-users',
		'url'   => base_url('system_admins')
	)
);
