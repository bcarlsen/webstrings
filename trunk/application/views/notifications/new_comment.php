<div class="note-container" data-id="<?php echo $note_id; ?>">
	<div class="pic-cropper small"><img src="<?php if($commenter->fb) echo $commenter->pic_url; else echo base_url()."public_html/images/default_avatar.png"; ?>" /></div>
	<div class="note-message">
		<div class="message-text"><?php echo $commenter->f_name; ?> commented on <?php echo $page->title; ?> in <em><?php echo $string->title; ?></em></div>
		<div class="note-actions-container">
			<div class="message-text">
				<a href="javascript:goToComment(<?php echo $string->id; ?>, <?php if($is_owner) echo "'my_strings'"; else echo "'shared_strings'"; ?>, <?php echo $page->id; ?>)">View Comment</a>
			</div>
		</div>
	</div>
</div>