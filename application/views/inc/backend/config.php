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

// $cb->inc_side_overlay           = 'inc/backend/views/inc_side_overlay.php';
$cb->inc_sidebar                = 'inc/backend/views/inc_sidebar.php';
$cb->inc_header                 = 'inc/backend/views/inc_header.php';
$cb->inc_footer                 = 'inc/backend/views/inc_footer.php';


// **************************************************************************************************
// MAIN MENU
// **************************************************************************************************

$cb->main_nav                   = array(
    array(
        'name'  => '<span class="sidebar-mini-hide">Dashboard</span>',
        'icon'  => 'si si-cup',
        'url'   => '../dashboard/index'
    ),
    array(

        'name'  => '<span class="sidebar-mini-hide">Add admins</span>',
        'icon'  => 'si si-user-follow',
        'url'   => '../auth/create_account'
    ),
    array(

        'name'  => '<span class="sidebar-mini-hide">View Users</span>',
        'icon'  => 'si si-user',
        'url'   => '../dashboard/view_users'
    )
);