<?php $this->load->view('inc/_global/config.php'); ?>
<?php
    if(isset($page_config) && $page_config)  $this->load->view('inc/backend/config.php'); 
?>
<?php $this->load->view('inc/_global/views/head_start.php'); ?>
<?php $this->load->view('inc/_global/views/head_end.php'); ?>
<?php $this->load->view('inc/_global/views/page_start.php'); ?>

<?php $this->load->view($content); ?>

<?php $this->load->view('inc/_global/views/page_end.php'); ?>
<?php $this->load->view('inc/_global/views/footer_start.php'); ?>

<?php 
    // <!-- Page JS Plugins -->
    if(isset($js_plugins) && !empty($js_plugins)) {
        foreach ($js_plugins as $plugin) {
            $cb->get_js($plugin);
        }
    }

    // Page JS Code
    if(isset($page_js) && !empty($page_js)) {
        $cb->get_js($page_js);
    }
?>
<?php $this->load->view('inc/_global/views/footer_end.php'); ?>
