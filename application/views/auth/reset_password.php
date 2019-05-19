<p>Valid token</p>

<?php 
	if($this->session->flashdata('msg') !== NULL){
		echo $this->session->flashdata('msg')['content'];
	}
?>
<?= validation_errors('<div class="alert alert-danger" >', '</div>');?>

<p>Show form</p>
