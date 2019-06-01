<?php
/**
 * page_start.php
 *
 * Author: pixelcave
 *
 * The start section of each page used in every page of the template
 *
 */
?>

<!-- Page Container -->
<div id="page-container"<?php $cb->page_classes(); ?>>
    <?php if(isset($cb->inc_side_overlay) && $cb->inc_side_overlay) { $this->load->view($cb->inc_side_overlay); } ?>
    <?php if(isset($cb->inc_sidebar) && $cb->inc_sidebar) { $this->load->view($cb->inc_sidebar); } ?>
    <?php if(isset($cb->inc_header) && $cb->inc_header) { $this->load->view($cb->inc_header); } ?>

    <!-- Main Container -->
    <main id="main-container">
