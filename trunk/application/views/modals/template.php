<div class="modal-header">	
	<h1><?php echo $modal_title; ?></h1>
</div>

<div class="modal-bottom">
	<?php $this->load->view('modals/'.$modal_content_file); ?>
</div>