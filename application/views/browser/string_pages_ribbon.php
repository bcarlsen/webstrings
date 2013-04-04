<a class="ribbon-tool" href="javascript:buildModal('<?php echo site_url('modals/edit_string/'.$string_id); ?>', 'modal-edit-string')"><i class="icon icon-pencil"></i></a>
<a class="ribbon-tool" href="javascript:buildModal('<?php echo site_url('modals/contributors/'.$string_id); ?>', 'modal-contributors')"><i class="icon icon-add-user"></i></a>
<a class="ribbon-tool" href="javascript:buildModal('<?php echo site_url('modals/share/'.$string_id); ?>', 'modal-share')"><i class="icon icon-share"></i></a>
<a class="ribbon-tool ribbon-comments"><i class="icon icon-comments"></i></a>
<?php if($roles->is_owner): ?>
	<a class="ribbon-tool trash" href="javascript:buildModal('<?php echo site_url('modals/delete_string/'.$string_id); ?>', 'modal-delete-string')"><i class="icon icon-trash"></i></a>
<?php endif; ?>