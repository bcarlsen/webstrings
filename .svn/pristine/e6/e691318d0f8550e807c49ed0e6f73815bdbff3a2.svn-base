<?php echo form_open('modals/log_in'.$params, array('id' => 'modalForm')); ?>
<div class="modal-content">
	<div class="control-group">
		<?php echo form_label('Email', 'email'); ?>
		<span class="input-wrapper"><input type="text" name="email" id="loginEmail"/></span>
	</div>
	
	<div class="control-group">	
		<?php echo form_label('Password', 'password'); ?>
		<span class="input-wrapper"><?php echo form_password('password', '');?></span>
	</div>
</div>

<div class="modal-footer">
	<a href="javascript:closeModal()" class="modal-button left">Cancel</a>
	<?php echo form_submit('submit', 'Login', 'class="modal-button right"'); ?>
</div>

<?php echo form_close(); ?>
