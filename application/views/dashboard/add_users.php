<?php
echo "<pre>Register user</pre>";
if ($this->session->flashdata('msg') !== NULL) {
	echo $this->session->flashdata('msg')['content'];
}
echo validation_errors('<div class="alert alert-danger" >', '</div>');
