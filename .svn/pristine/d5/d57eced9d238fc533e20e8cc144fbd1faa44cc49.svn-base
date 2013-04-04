<?php echo form_open('modals/share/'.$string_id, array('id' => 'modalForm', 'onsubmit' =>  'return submitModalForm();'), array('submit' => 'submit')); ?>

	<div class="modal-content">
		<div class="control-group single-line-form">
			<input type="submit" name="submit" value="Share URL"/>
			<span class="input-wrapper"><input type="text" name="email" placeholder="Email..." /></span>
		</div>
	</div>
	
	<?php echo validation_errors('<div class="modal-content"><p>','</p></div>'); ?>
	
	<?php if(isset($message)): ?>
		<div class="modal-content">
			<p><?php echo $message; ?></p>
		</div>
	<?php endif; ?>

<div class="modal-footer">
	<a href="javascript:closeModal()" class="modal-button left">Close</a>
</div>
<?php echo form_close(); ?>