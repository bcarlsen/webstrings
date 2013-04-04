<div class="modal-content">
	<p>Are you sure you want to permanently delete your string?</p>
	<?php
		
		echo form_open('modals/delete_string/'.$string_id, array('id' => 'modalForm', 'onsubmit' =>  'submitModalForm()'), array('submit' => 'submit'));
		
		echo form_hidden('string_id', $string_id);
	
		echo form_close();
	?>
</div>

<div class="modal-footer">
	<a href="javascript:closeModal()" class="modal-button left">Cancel</a>
	<a href="javascript:submitModalForm()" class="modal-button right">Delete</a>
</div>