<?php echo form_open('modals/add_page/'.$string_id, array('id' => 'modalForm', 'onsubmit' =>  'submitModalForm()'), array('submit' => 'submit')); ?>
	
<div class="modal-content">
	<div class="control-group">
		<?php echo form_label('Page Title', 'title'); ?>
		<span class="input-wrapper"><?php echo form_input('title', ''); ?></span>
	</div>
</div>
	
	<hr />
	
<div class="modal-content">
	<div class="control-group">
		<?php echo form_label('URL', 'url'); ?>
		<span class="input-wrapper"><?php echo form_input('url', 'http://'); ?></span>
	</div>
</div>

<div class="modal-footer">
	<a href="javascript:closeModal()" class="modal-button left">Cancel</a>
	<a href="javascript:submitModalForm()" class="modal-button right">Add</a>
</div>

<?php echo form_close(); ?>