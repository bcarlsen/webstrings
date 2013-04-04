<?php echo form_open('modals/new_string', array('id' => 'modalForm', 'onsubmit' =>  'submitModalForm()'), array('submit' => 'submit')); ?>
	
<div class="modal-content">
	<div class="control-group">
		<?php echo form_label('Title', 'title'); ?>
		<span class="input-wrapper"><?php echo form_input('title', 'Example String'); ?></span>
	</div>
</div>
	
	<hr />
	
<div class="modal-content">
	<div class="control-group">
		<?php echo form_label('Description', 'description'); ?>
		<span class="input-wrapper"><?php echo form_input('description', 'Insert description here.'); ?></span>
	</div>
</div>

<div class="modal-footer">
	<a href="javascript:closeModal()" class="modal-button left">Cancel</a>
	<a href="javascript:submitModalForm()" class="modal-button right">Add</a>
</div>

<?php echo form_close(); ?>