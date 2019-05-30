<?php $this->load->view('inc/_global/config.php'); ?>
<?php
if (isset($page_config) && $page_config)  $this->load->view('inc/backend/config.php');
?>
<?php $this->load->view('inc/_global/views/head_start.php'); ?>
	<?php // <!-- Page JS Plugins -->
		if (isset($js_plugins_css) && !empty($js_plugins_css)) {
			foreach ($js_plugins_css as $plugin_css) {
				echo '<link rel="stylesheet" href="'.$cb->assets_folder.'/'.$plugin_css.'">';
			}
		}
	?>
<?php $this->load->view('inc/_global/views/head_end.php'); ?>
<?php $this->load->view('inc/_global/views/page_start.php'); ?>

<?php $this->load->view($content); ?>

<?php $this->load->view('inc/_global/views/page_end.php'); ?>
<?php $this->load->view('inc/_global/views/footer_start.php'); ?>

<?php
// <!-- Page JS Plugins -->
$cb->get_js('js/plugins/bootstrap-notify/bootstrap-notify.min.js');
if (isset($js_plugins) && !empty($js_plugins)) {
	foreach ($js_plugins as $plugin) {
		$cb->get_js($plugin);
	}
}

// Page JS Code
if (isset($page_js) && !empty($page_js)) {
	$cb->get_js($page_js);
}
?>
<?php $this->load->view('inc/_global/views/footer_end.php'); ?>
